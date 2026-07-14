const LINE_PUSH_ENDPOINT = "https://api.line.me/v2/bot/message/push";

function readBody(request) {
  if (request.body && typeof request.body === "object") {
    return Promise.resolve(request.body);
  }

  return new Promise((resolve, reject) => {
    let rawBody = "";
    request.on("data", (chunk) => {
      rawBody += chunk;
    });
    request.on("end", () => {
      try {
        resolve(rawBody ? JSON.parse(rawBody) : {});
      } catch (error) {
        reject(error);
      }
    });
    request.on("error", reject);
  });
}

function sendJson(response, statusCode, payload) {
  response.statusCode = statusCode;
  response.setHeader("Content-Type", "application/json; charset=utf-8");
  response.setHeader("Cache-Control", "no-store");
  response.end(JSON.stringify(payload));
}

function sanitizeMessage(message) {
  return String(message || "")
    .replace(/\r\n/g, "\n")
    .trim()
    .slice(0, 1000);
}

module.exports = async function handler(request, response) {
  response.setHeader("Access-Control-Allow-Methods", "POST, OPTIONS");
  response.setHeader("Access-Control-Allow-Headers", "Content-Type");

  if (request.method === "OPTIONS") {
    response.statusCode = 204;
    response.end();
    return;
  }

  if (request.method !== "POST") {
    sendJson(response, 405, { error: "Method Not Allowed" });
    return;
  }

  const channelAccessToken = process.env.LINE_CHANNEL_ACCESS_TOKEN;
  const toUserId = process.env.LINE_TO_USER_ID;

  if (!channelAccessToken || !toUserId) {
    sendJson(response, 500, {
      error: "LINE_CHANNEL_ACCESS_TOKEN と LINE_TO_USER_ID をサーバー環境変数に設定してください。",
    });
    return;
  }

  let body;
  try {
    body = await readBody(request);
  } catch {
    sendJson(response, 400, { error: "JSONの形式が正しくありません。" });
    return;
  }

  const text = sanitizeMessage(body.message);
  if (!text) {
    sendJson(response, 422, { error: "送信するメッセージがありません。" });
    return;
  }

  const lineResponse = await fetch(LINE_PUSH_ENDPOINT, {
    method: "POST",
    headers: {
      Authorization: `Bearer ${channelAccessToken}`,
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      to: toUserId,
      messages: [{ type: "text", text }],
    }),
  });

  if (!lineResponse.ok) {
    const detail = await lineResponse.text();
    sendJson(response, 502, {
      error: "LINE Messaging APIへの送信に失敗しました。",
      detail,
    });
    return;
  }

  sendJson(response, 200, { ok: true });
};

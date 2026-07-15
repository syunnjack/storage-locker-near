const crypto = require("crypto");

function readRawBody(request) {
  return new Promise((resolve, reject) => {
    let rawBody = "";
    request.on("data", (chunk) => {
      rawBody += chunk;
    });
    request.on("end", () => resolve(rawBody));
    request.on("error", reject);
  });
}

function sendJson(response, statusCode, payload) {
  response.statusCode = statusCode;
  response.setHeader("Content-Type", "application/json; charset=utf-8");
  response.setHeader("Cache-Control", "no-store");
  response.end(JSON.stringify(payload));
}

function isValidSignature(rawBody, signature, channelSecret) {
  if (!channelSecret) return true;
  if (!signature) return false;

  const expected = crypto
    .createHmac("sha256", channelSecret)
    .update(rawBody)
    .digest("base64");

  return crypto.timingSafeEqual(Buffer.from(signature), Buffer.from(expected));
}

module.exports = async function handler(request, response) {
  if (request.method !== "POST") {
    sendJson(response, 200, {
      ok: true,
      message: "LINE webhook endpoint is ready. Set this URL in LINE Developers Console.",
    });
    return;
  }

  const rawBody = await readRawBody(request);
  const signature = request.headers["x-line-signature"];

  if (!isValidSignature(rawBody, signature, process.env.LINE_CHANNEL_SECRET)) {
    sendJson(response, 401, { error: "Invalid LINE signature." });
    return;
  }

  let body;
  try {
    body = JSON.parse(rawBody || "{}");
  } catch {
    sendJson(response, 400, { error: "Invalid JSON." });
    return;
  }

  const userIds = (body.events || [])
    .map((event) => event.source?.userId)
    .filter(Boolean);

  console.log("LINE webhook userIds:", userIds);

  sendJson(response, 200, {
    ok: true,
    userIds,
    hint: userIds.length
      ? "Copy this userId to LINE_TO_USER_ID."
      : "Send a message to the official account or add it as a friend, then check function logs.",
  });
};

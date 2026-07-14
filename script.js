const lockers = [
  {
    name: "在来線改札横 A",
    area: "inside",
    walk: "徒歩1分",
    sizes: { S: 18, M: 11, L: 6 },
    base: 700,
    score: "最短",
    partner: "ASTY静岡クーポン",
  },
  {
    name: "北口地下道 B",
    area: "north",
    walk: "徒歩3分",
    sizes: { S: 25, M: 8, L: 2 },
    base: 620,
    score: "雨に強い",
    partner: "カフェ送客",
  },
  {
    name: "南口ホテル前 C",
    area: "south",
    walk: "徒歩4分",
    sizes: { S: 13, M: 7, L: 9 },
    base: 680,
    score: "大型多め",
    partner: "ホテル配送",
  },
  {
    name: "観光案内所横 D",
    area: "north",
    walk: "徒歩5分",
    sizes: { S: 10, M: 3, L: 0 },
    base: 540,
    score: "安い",
    partner: "土産店特典",
  },
];

const appConfig = window.LOCKERLOOP_CONFIG || {};
let selectedIndex = 0;
let availableOnly = true;

const areaSelect = document.querySelector("#areaSelect");
const sizeSelect = document.querySelector("#sizeSelect");
const hoursInput = document.querySelector("#hoursInput");
const hoursLabel = document.querySelector("#hoursLabel");
const results = document.querySelector("#lockerResults");
const availableToggle = document.querySelector("#availableToggle");
const lineNotifyButton = document.querySelector("#lineNotifyButton");
const lineNotifyStatus = document.querySelector("#lineNotifyStatus");

function yen(value) {
  return new Intl.NumberFormat("ja-JP", { style: "currency", currency: "JPY", maximumFractionDigits: 0 }).format(value);
}

function availableCount(locker, size) {
  if (size === "all") {
    return Object.values(locker.sizes).reduce((sum, count) => sum + count, 0);
  }
  return locker.sizes[size];
}

function selectedSize() {
  return sizeSelect.value === "all" ? "L" : sizeSelect.value;
}

function bookingSnapshot() {
  const locker = lockers[selectedIndex];
  const hours = Number(hoursInput.value);
  const size = selectedSize();
  const sizePremium = { S: -120, M: 0, L: 140 }[size];
  const peakPremium = hours >= 6 ? 100 : 0;
  const lockerPrice = Math.max(320, locker.base + sizePremium + peakPremium);
  const fee = Math.round(lockerPrice * 0.12);
  const points = Math.round((lockerPrice + fee) * 0.1);
  const monthlyProfit = 984000 + lockerPrice * 312 + fee * 1740;

  return {
    locker,
    hours,
    size,
    lockerPrice,
    fee,
    points,
    monthlyProfit,
    total: lockerPrice + fee,
  };
}

function filteredLockers() {
  const area = areaSelect.value;
  const size = sizeSelect.value;
  return lockers
    .map((locker, index) => ({ ...locker, index }))
    .filter((locker) => area === "all" || locker.area === area)
    .filter((locker) => !availableOnly || availableCount(locker, size) > 0);
}

function renderResults() {
  const size = sizeSelect.value;
  const visible = filteredLockers();
  if (!visible.some((locker) => locker.index === selectedIndex) && visible[0]) {
    selectedIndex = visible[0].index;
  }

  results.innerHTML = visible
    .map((locker) => {
      const available = availableCount(locker, size);
      return `
        <button class="locker-card ${locker.index === selectedIndex ? "active" : ""}" type="button" data-id="${locker.index}">
          <h3>${locker.name}</h3>
          <p>${locker.walk} / 空き ${available} / ${locker.partner}</p>
          <div class="tags">
            <span>${locker.score}</span>
            <span>S ${locker.sizes.S}</span>
            <span>M ${locker.sizes.M}</span>
            <span>L ${locker.sizes.L}</span>
          </div>
        </button>
      `;
    })
    .join("");

  document.querySelectorAll(".locker-card, .pin").forEach((button) => {
    button.classList.toggle("active", Number(button.dataset.id) === selectedIndex);
  });

  updateBooking();
}

function updateBooking() {
  const { locker, hours, size, lockerPrice, fee, points, monthlyProfit } = bookingSnapshot();

  document.querySelector("#selectedName").textContent = locker.name;
  document.querySelector("#selectedMeta").textContent = `${locker.walk} / ${size}サイズ空き ${locker.sizes[size]}`;
  document.querySelector("#lockerPrice").textContent = yen(lockerPrice);
  document.querySelector("#feePrice").textContent = yen(fee);
  document.querySelector("#pointBack").textContent = `+${points} pt`;
  document.querySelector("#profitForecast").textContent = yen(monthlyProfit);
  document.querySelector("#utilizationValue").textContent = `${Math.min(96, 62 + hours * 4)}%`;
}

function lineNotifyEndpoint() {
  return appConfig.LINE_NOTIFY_ENDPOINT || "/api/line-notify";
}

function lineNotifyMessage() {
  const { locker, hours, size, lockerPrice, fee, points, total } = bookingSnapshot();
  return [
    "LockerLoop 予約パス",
    `ロッカー: ${locker.name}`,
    `場所: ${locker.walk}`,
    `サイズ: ${size}`,
    `利用時間: ${hours}時間`,
    `空き数: ${locker.sizes[size]}`,
    `料金: ${yen(total)}（ロッカー ${yen(lockerPrice)} / 手数料 ${yen(fee)}）`,
    `CashPoint: +${points} pt`,
    `特典: ${locker.partner}`,
  ].join("\n");
}

function setLineStatus(message, state = "") {
  if (!lineNotifyStatus) return;
  lineNotifyStatus.textContent = message;
  lineNotifyStatus.dataset.state = state;
}

async function sendLineNotification() {
  if (!lineNotifyButton) return;
  lineNotifyButton.disabled = true;
  lineNotifyButton.textContent = "送信中...";
  setLineStatus("LINEへ予約パスを送信しています。", "loading");

  try {
    const response = await fetch(lineNotifyEndpoint(), {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        type: "locker_reservation",
        message: lineNotifyMessage(),
        reservation: bookingSnapshot(),
      }),
    });
    const data = await response.json().catch(() => ({}));

    if (!response.ok) {
      throw new Error(data.error || "LINE通知の送信に失敗しました。");
    }

    setLineStatus("LINEに予約パスを送信しました。", "success");
  } catch (error) {
    setLineStatus(error.message || "LINE通知の送信に失敗しました。環境変数とAPI設定を確認してください。", "error");
  } finally {
    lineNotifyButton.disabled = false;
    lineNotifyButton.textContent = "LINEで通知";
  }
}

document.addEventListener("click", (event) => {
  const scrollTarget = event.target.closest("[data-scroll]");
  if (scrollTarget) {
    document.querySelector(scrollTarget.dataset.scroll)?.scrollIntoView({ behavior: "smooth" });
  }

  const selectTarget = event.target.closest(".locker-card, .pin");
  if (selectTarget) {
    selectedIndex = Number(selectTarget.dataset.id);
    renderResults();
  }
});

availableToggle.addEventListener("click", () => {
  availableOnly = !availableOnly;
  availableToggle.classList.toggle("is-on", availableOnly);
  availableToggle.setAttribute("aria-pressed", String(availableOnly));
  renderResults();
});

[areaSelect, sizeSelect].forEach((control) => control.addEventListener("change", renderResults));
hoursInput.addEventListener("input", () => {
  hoursLabel.textContent = hoursInput.value;
  updateBooking();
});

document.querySelector("#reserveButton").addEventListener("click", () => {
  const button = document.querySelector("#reserveButton");
  button.textContent = "予約パスを発行しました";
  setTimeout(() => {
    button.textContent = "選択ロッカーを予約";
  }, 1800);
});

lineNotifyButton?.addEventListener("click", sendLineNotification);

renderResults();

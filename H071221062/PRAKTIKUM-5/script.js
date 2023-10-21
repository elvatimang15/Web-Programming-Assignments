// Deklarasi variabel untuk menghitung total kartu pemain (mySums) dan bot (botSums)
let botSums = 0;
let mySums = 0;

// Variabel untuk menghitung kartu As pemain dan bot
let botASCards = 0;
let myASCards = 0;

// Variabel untuk menyimpan daftar kartu
let cards;

// Variabel yang menunjukkan apakah pemain masih dapat mengambil kartu
let isCanHit = true;

// Mendapatkan elemen-elemen dari DOM menggunakan ID atau class
const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");
const topUpButton = document.getElementById("btn-top-up");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

// Menjalankan beberapa inisialisasi ketika halaman dimuat
window.onload = () => {
  // Memuat daftar kartu
  buildUserCards();

  // Mengacak kartu-kartu tersebut
  shuffleCards();

  // Menonaktifkan tombol "Ambil Kartu" dan "Tahan Kartu"
  takeCardButton.setAttribute("disabled", true);
  holdCardsButton.setAttribute("disabled", true);
};

// Fungsi untuk membangun daftar kartu
function buildUserCards() {
  let cardTypes = ["H", "B", "S", "K"];
  let cardValues = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "K",
    "Q",
    "J",
  ];
  cards = [];

  for (let i = 0; i < cardTypes.length; i++) {
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  }
}

// Fungsi untuk mengacak kartu-kartu
function shuffleCards() {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
}

// Menambahkan event listener ke tombol "Mulai Permainan"
startGameButton.addEventListener("click", function () {
  // Memeriksa apakah pemain memiliki cukup uang untuk bermain
  if (parseInt(myMoney.textContent) <= 0) {
    alert("Uang kamu habis");
    return;
  } else {
    // Mereset beberapa variabel jika pemain ingin mencoba lagi
    if (startGameButton.textContent === "TRY AGAIN") {
      botSums = 0;
      mySums = 0;
      botASCards = 0;
      myASCards = 0;
      isCanHit = true;
      resultElement.textContent = "";

      // Menghapus kartu-kartu dari layar
      const allCardsImage = document.querySelectorAll("img");
      for (let i = 0; i < allCardsImage.length; i++) {
        allCardsImage[i].remove();
      }

      // Menambahkan kartu bot yang tersembunyi
      let cardImg = document.createElement("img");
      cardImg.src = "/images/cards/BACK.png";
      cardImg.className = "hidden-card";
      botCardsElement.append(cardImg);

      // Memuat ulang daftar kartu dan mengacaknya
      buildUserCards();
      shuffleCards();
    }

    // Mengaktifkan tombol "Ambil Kartu" dan "Tahan Kartu"
    takeCardButton.disabled = false;
    holdCardsButton.disabled = false;
    startGameButton.textContent = "TRY AGAIN";
    startGameButton.setAttribute("disabled", true);

    // Membagikan dua kartu awal ke pemain
    for (let i = 0; i < 2; i++) {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`;
      mySums += getValueOfCard(card);
      myASCards += checkASCard(card);
      mySumsElement.textContent = mySums;
      myCardsElement.append(cardImg);
    }
  }
});

// Event listener untuk tombol "Ambil Kartu"
takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return;

  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card);
  myASCards += checkASCard(card);
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

  // Menangani kondisi jika pemain kalah
  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "Kamu Kalah";
    myMoney.textContent -= inputMoney.value;
  }
});

// Event listener untuk tombol "Tahan Kartu"
holdCardsButton.addEventListener("click", function () {
  // Menambahkan kartu-bot dan menghitung hasil
  const addBotCards = () => {
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`;
      botSums += getValueOfCard(card);
      botASCards += checkASCard(card);
      botCardsElement.append(cardImg);
      botSumsElement.textContent = botSums;

      // Mengambil keputusan berdasarkan total kartu bot
      if (botSums < 18) {
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        // Menentukan hasil permainan dan memperbarui uang pemain
        let message = "";
        if (mySums > 21 || mySums % 22 < botSums % 22) {
          message = "Kamu kalah!!";
          myMoney.textContent -= inputMoney.value;
        } else if (botSums > 21 || mySums % 22 > botSums % 22) {
          message = "Kamu menang!!";
          myMoney.textContent = parseInt(myMoney.textContent) + parseInt(inputMoney.value);
        } else if (mySums === botSums) message = "SERI";

        resultElement.textContent = message;
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  };

  addBotCards();
});

// Event listener untuk tombol "Top Up" (menambahkan uang)
topUpButton.addEventListener("click", function () {
  // Mengambil jumlah top-up dari input dan memperbarui saldo pemain
  const topUpAmount = parseInt(document.getElementById("top-up-amount").value);

  if (isNaN(topUpAmount) || topUpAmount <= 0) {
    alert("Masukkan jumlah top up yang valid.");
    return;
  }

  myMoney.textContent = parseInt(myMoney.textContent) + topUpAmount;
});

// Fungsi untuk mendapatkan nilai kartu
function getValueOfCard(card) {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    // Kartu As
    if (value == "A") return 11;
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
}

// Fungsi untuk memeriksa apakah kartu adalah As
function checkASCard(card) {
  if (card[0] == "A") return 1;
  else return 0;
}

// Fungsi untuk mengurangi nilai kartu As jika perlu
function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
}

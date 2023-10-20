let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanTakeCard = true;

const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementsByClassName("result");
const resultImgElement = document.getElementById("result-img");
const resultModal = document.getElementById("result-modal");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  takeCardButton.setAttribute("disabled", true);
  holdCardsButton.setAttribute("disabled", true);
};

const buildUserCards = () => {
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
};

const shuffleCards = () => {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
};

startGameButton.addEventListener("click", () => {
  if (inputMoney.value < 0) {
    alert("Input uang tidak boleh kurang dari 0");
    return;
  } else if (inputMoney.value === "") {
    alert("Pasang Uang Anda untuk Bermain");
    return;
  }

  if (parseInt(myMoney.textContent) < inputMoney.value) {
    alert("Maaf, uang kamu kurang");
    return;
  }

  if (startGameButton.textContent === "Coba Lagi") {
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanTakeCard = true;

    const allCardsImage = document.querySelectorAll("img");
    // Dikasih -1 untuk mempertahankan meme image-nya
    for (let i = 0; i < allCardsImage.length - 1; i++) {
      allCardsImage[i].remove();
    }

    mySumsElement.textContent = 0;
    botSumsElement.textContent = 0;

    let cardImg = document.createElement("img");
    cardImg.src = "/images/cards/BACK.png";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg);

    buildUserCards();
    shuffleCards();
  }

  takeCardButton.disabled = false;
  holdCardsButton.disabled = false;
  startGameButton.textContent = "Coba Lagi";
  startGameButton.setAttribute("disabled", true);

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `/images/cards/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);
  }
});

takeCardButton.addEventListener("click", () => {
  if (!isCanTakeCard) return;

  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card);
  myASCards += checkASCard(card);
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (reduceASCardValue(mySums, myASCards) > 21) isCanTakeCard = false;

  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement[1].textContent = "ANDA KALAH"; 
    resultImgElement.src = "/images/memes/lose.jpg";
    myMoney.textContent -= inputMoney.value;
    showResultModal();
    setTimeout(() => {
      resultElement[0].textContent = "ANDA KALAH";
    }, 4500);
  }
});

holdCardsButton.addEventListener("click", () => {
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
  }, 1000);
  takeCardButton.disabled = true;
  holdCardsButton.disabled = true;

  const addBotCards = () => {
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`;
      botSums += getValueOfCard(card);
      botASCards += checkASCard(card);
      botSumsElement.textContent = botSums;
      botCardsElement.append(cardImg);

      if (botSums < 17) {
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanTakeCard = false;

        let message = "";
        if (mySums > 21 || mySums % 22 < botSums % 22) {
          message = "ANDA KALAH";
          resultImgElement.src = "/images/memes/lose.jpeg";
          myMoney.textContent -= inputMoney.value;
          showResultModal();
        } else if (botSums > 21 || mySums % 22 > botSums % 22) {
          message = "ANDA MENANG";
          resultImgElement.src = "/images/memes/win.jpg";
          myMoney.textContent = inputMoney.value * 2 * 3;
          showResultModal();
        } else if (mySums === botSums) {
          message = "SERI";
          resultImgElement.src = "/images/memes/draw.jpg";
          showResultModal();
        }

        resultElement[1].textContent = message;
        setTimeout(() => {
          resultElement[0].textContent = message;
        }, 4500);
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  };

  addBotCards();
});

const showResultModal = () => {
  setTimeout(() => {
    resultModal.showModal();
  }, 500);
  setTimeout(() => {
    resultModal.close();
  }, 3500);
};

// Helpers Function -------------
const getValueOfCard = (card) => {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    // Kartu AS
    if (value == "A") return 11;
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
};

const checkASCard = (card) => {
  if (card[0] == "A") return 1;
  else return 0;
};

const reduceASCardValue = (sums, asCards) => {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
};

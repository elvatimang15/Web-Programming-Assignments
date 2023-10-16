let betNow = 0;
let gameStarted = false; 
let moneyValue = 5000; 
let buttonClicked = false;
const btnStartGame = document.querySelector('#btnStartGame');
const btnPlayAgain = document.querySelector('#btnPlayAgain')
const btnResetMoney = document.querySelector('#btnResetMoney');

function cekInputan() {
    if (gameStarted) {
        return;
    }
    const inputMoney = document.querySelector('#inputMoney');
    const inputValue = inputMoney.value;

    if (inputValue === '' || isNaN(inputValue)) {
        alert("Set your bet first");
    } else if (moneyValue < parseInt(inputValue)) {
        alert("Your money is less than your bet");
    } else {
        gameStarted = true;
        betNow = moneyValue - parseInt(inputValue);
        moneyValue = betNow;
        money.innerHTML = betNow;
        startGame();
    }
}
document.getElementById("btnStartGame").addEventListener("click", cekInputan);

btnResetMoney.addEventListener('click', function(){
        moneyValue = 5000; 
        money.innerHTML = moneyValue;
        gameStarted = false;
});


let dealerSum = 0;
let yourSum = 0;

let dealerAceCount = 0;
let yourAceCount = 0; 

let hidden;
let deck;

let canHit = true; 

window.onload = function() {
    buildDeck();
    shuffleDeck();
    startGame();
    wantToPlayAgain();
}

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]);
        }
    }
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length); 
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
    console.log(deck);
}

function startGame() {
    btnResetMoney.setAttribute("disabled", true)
    btnPlayAgain.setAttribute("disabled", true)
    hidden = deck.pop();
    dealerSum += getValue(hidden);
    dealerAceCount += checkAce(hidden);

    while (dealerSum < 17) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./img/" + card + ".png";
        dealerSum += getValue(card);
        dealerAceCount += checkAce(card);
        document.getElementById("dealer-cards").append(cardImg);
    }
    console.log(dealerSum);

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./img/" + card + ".png";
        yourSum += getValue(card);
        yourAceCount += checkAce(card);
        document.getElementById("your-cards").append(cardImg);
    }

    console.log(yourSum);
    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);

}

function hit() {
    if (!canHit) {
        return;
    }

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./img/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);

    if (reduceAce(yourSum, yourAceCount) > 21) {
        canHit = false;
    }
}

function stay() {
    if (!gameStarted) {
        return;
    }
    btnStartGame.setAttribute("disabled", true);
    btnPlayAgain.removeAttribute("disabled");
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    yourSum = reduceAce(yourSum, yourAceCount);
    canHit = false;
    document.getElementById("hidden").src = "./img/" + hidden + ".png";

    let message = "";
    const inputMoney = document.querySelector('#inputMoney');
    const inputValue = parseInt(inputMoney.value);

    if (yourSum > 21) {
        message = "You Lose!";
        moneyValue -= inputValue;
    } else if (dealerSum > 21) {
        message = "You win!";
        moneyValue += inputValue;
    } else if (yourSum == dealerSum) {
        message = "Tie!";
    } else if (yourSum > dealerSum) {
        message = "You Win!";
        moneyValue += inputValue;
    } else {
        message = "You Lose!";
        moneyValue -= inputValue;
    }

    document.getElementById("dealer-sum").innerText = dealerSum;
    document.getElementById("your-sum").innerText = yourSum;
    document.getElementById("results").innerText = message;
    document.getElementById("money").innerHTML = moneyValue;
    gameStarted = false;
}



function getValue(card) {
    let data = card.split("-");
    let value = data[0];

    if (isNaN(value)) { 
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }
    return playerSum;
}

function wantToPlayAgain() {
    btnStartGame.removeAttribute("disabled")
    btnResetMoney.removeAttribute("disabled")
    gameStarted = false;
    yourSum = 0;
    dealerSum = 0;
    dealerAceCount = 0;
    yourAceCount = 0;
    canHit = true;
    hidden = null;

    document.getElementById("hidden").src = "./img/BACK.png";
    document.getElementById("your-cards").innerHTML = "";
    document.getElementById("dealer-cards").innerHTML = "";
    document.getElementById("dealer-sum").innerText = ""; 
    document.getElementById("your-sum").innerText = ""; 
    document.getElementById("money").innerHTML = moneyValue; 

    cekInputan();
}

document.getElementById("btnPlayAgain").addEventListener("click", wantToPlayAgain);



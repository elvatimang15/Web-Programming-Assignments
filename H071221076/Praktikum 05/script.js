let botSums = 0;    //menyimpan jumlah poin kartu
let mySums = 0;

let botASCards = 0;   // menyimpan jumlah krtu as
let myASCards = 0;

let cards;             //menyimpan daftar kartu
let isCanHit = true;   //pemain masih dapat mengambil kartu tambahan atau tidak.

//menghubugkan html dan js
const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");

// menampilkan jumlah poin dan uang pemain 
const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];
//dan jumlah poin bot
const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

window.onload = () => {
    buildUserCards();     //mengisi daftar kartu
    shuffleCards();       //mengacak kartu
    takeCardButton.setAttribute("disabled", true);
    holdCardsButton.setAttribute("disabled", true);
};

// fungsi untuk daftar kartu
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
    for (let i = 0; i < cardTypes.length; i++) {          //cardType
        for (let j = 0; j < cardValues.length; j++) {     //cardValue
            cards.push(cardValues[j] + "-" + cardTypes[i]);       //digabungkan dan ditambahkan ke dalam array cards
        }
    }
}

// fungsi untuk mengacak kartu
function shuffleCards() {
    for (let i = 0; i < cards.length; i++) {
        let randomNum = Math.floor(Math.random() * cards.length);       //menghasilkan angka acak randomNum antara 0 dan panjang array
        let temp = cards[i];
        cards[i] = cards[randomNum];
        cards[randomNum] = temp;
    }
}

// START BUTTON
startGameButton.addEventListener("click", function () {
    if (startGameButton.textContent === "TRY AGAIN") {
        botSums = 0;
        mySums = 0;
        botASCards = 0;
        myASCards = 0;
        isCanHit = true;

        const allCardsImage = document.querySelectorAll("img");    //mencari semua gambar di html
        for (let i = 0; i < allCardsImage.length; i++) {           //mengiterasi melalui setiap elemen gambar yang ditemukan
            allCardsImage[i].remove();                             //menghapus elemen gambar yang sedang diiterasi     
        }

        //cardbot
        let cardImg = document.createElement("img");
        cardImg.src = "assets/cards/BACK.png";
        cardImg.className = "hidden-card";
        botCardsElement.append(cardImg);                        //ditambahkan ke elemen HTML yang memiliki kelas CSS "bot-cards" dengan menggunakan metode append()

        buildUserCards();
        shuffleCards();
    }

    takeCardButton.disabled = false;
    holdCardsButton.disabled = false;
    startGameButton.textContent = "TRY AGAIN";
    startGameButton.setAttribute("disabled", true);

    for (let i = 0; i < 2; i++) {                           //menambahkan dua kartu awal ke tangan pemain dmana pemain dan bot masing2 mendapatkan dua kartu awal
        let cardImg = document.createElement("img");
        let card = cards.pop();                             //untuk mengambil kartu dari array dan menghapusnya dari daftar.
        cardImg.src = `assets/cards/${card}.png`;
        mySums += getValueOfCard(card);                     //nilai dari kartu yang diambil dari cards ditambahkan ke total poin pemain menggunakan getValueOfCard(card)
        myASCards += checkASCard(card);                     //jika kartu diambil krtu as, maka  jumlah kartu As pemain akan diperbarui
        mySumsElement.textContent = mySums;                 //tampilkan elemen di html yg baru
        myCardsElement.append(cardImg);                     //gambar kartu akan muncul dalam elemen pada kartu pemain
    }
});

// TAKE CARD BUTTON
takeCardButton.addEventListener("click", function () {
    if (!isCanHit) return;

    //menampilkan semua kartu yang telah dipilih
    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `assets/cards/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);

    if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

    if (mySums > 21) {
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
        startGameButton.disabled = false;
        resultElement.textContent = "KALAH!";
        if (myMoney.textContent - inputMoney.value < 0) {
            resetGame();                                        //jika uang habis maka game terreset kembali
        } else {
            myMoney.textContent -= inputMoney.value;            //uang pemain akan dikurang dengan nilai taruhan
        }
    }
});

// HOLD CARD BUTTON
holdCardsButton.addEventListener("click", function () {
    //menunda eksekusi kode selama 1 detik sebelum kode tersebut dijalankan dan menghapus krtu sebelumnya
    setTimeout(() => {
        document.getElementsByClassName("hidden-card")[0].remove();
    }, 1000);

    const addBotCards = () => {
        setTimeout(() => {
            //menampilkan semua kartu yang telah dipilih
            let cardImg = document.createElement("img");
            let card = cards.pop();
            cardImg.src = `assets/cards/${card}.png`;
            botSums += getValueOfCard(card);
            botASCards += checkASCard(card);
            botCardsElement.append(cardImg);
            botSumsElement.textContent = botSums;

            if (botSums < 18) {
                addBotCards();
            } else {
                //Jika total poin kartu bot >=18, maka bot tidak mengambil kartu lagi
                //cek kartu as yang nilainya diubah untuk menghindri busting
                botSums = reduceASCardValue(botSums, botASCards);
                mySums = reduceASCardValue(mySums, myASCards);
                isCanHit = false;

                let message = "";
                if (mySums > 21 || mySums % 22 < botSums % 22) {
                    message = "KALAH!";
                    myMoney.textContent -= inputMoney.value;
                } else if (botSums > 21 || mySums % 22 > botSums % 22) {
                    message = "MENANG!!!";
                    myMoney.textContent = inputMoney.value * 2 * 3;
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

function getValueOfCard(card) {
    let cardDetail = card.split("-");
    let value = cardDetail[0];

    //cek angka atau bukan
    if (isNaN(value)) {
        // Kartu AS (nilai 11 atau 1 tergantung total poin)
        if (value == "A") return 11;
        else return 10;
    }

    //mengembalikan nilai numerik setelah mengonversi value menjadi angka dengan menggunakan parseInt.
    return parseInt(value);
}

//memeriksa apakah sebuah kartu adalah kartu As
function checkASCard(card) {
    if (card[0] == "A") return 1;
    else return 0;
}

//mengurangi nilai kartu As
function reduceASCardValue(sums, asCards) {
    while (sums > 21 && asCards > 0) {
        sums -= 10;
        asCards -= 1;
    }
    return sums;
}
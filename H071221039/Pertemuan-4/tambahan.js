function palindrome(word) {
  const len = word.length;
  for (let i = 0; i < Math.floor(len / 2); i++) {
    if (word[i] !== word[len - 1 - i]) {
      return false;
    }
  }
  return true;
}

function nonPalindrome(input) {
  const words = input.split(' ');
  const hasil = [];

  for (const word of words) {
    if (!palindrome(word.toLowerCase())) {
      hasil.push(word);
    }
  }
  return hasil;
}

const prompt=require("prompt-sync")({sigint:true});
const inputan = (prompt("Masukkan kalimat : "))
// const input1 = 'Wow mereka janji bertemu di makam';
// const input2 = 'Katak naik honda civic pada malam hari di mimpi Dimitri';
console.log(nonPalindrome(inputan));

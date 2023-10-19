// Cipher text encrypt adalah dimana sebuah text digeser sebanyak n kali seperti abc dengan n=1 maka akan menghasilkan bcd atau Indonesia dengan n=13 maka akan menghasilkan Vaqbarfvn. Buatlah sebuah program cipher text di javascript

// let abjad = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]

function caesarCipher(text, shift) {
  let result = '';

  for (let i = 0; i < text.length; i++) {
    let char = text[i];


    if (char.match(/[a-zA-Z]/)) {
      const isUpperCase = char === char.toUpperCase();

      let charCode = char.charCodeAt(0);
      charCode = ((charCode - (isUpperCase ? 65 : 97) + shift) % 26) + (isUpperCase ? 65 : 97);

      result += String.fromCharCode(charCode);
    } else {
      result += char;
    }
  }

  return result;
}

// Contoh penggunaan
const prompt=require("prompt-sync")({sigint:true});

const plaintext = prompt("Masukkan kata : ")
const shift = parseInt(prompt("Masukkan shift : "))

const ciphertext = caesarCipher(plaintext, shift);

console.log(`Ciphertext: ${ciphertext}`);


// NO 1
// function hitungPangkat(angka, pangkat) {
//     if (pangkat === 0) {
//         return 1;
//     }

//     let hasil = 1;
//     for (let i = 1; i <= pangkat; i++) {
//         hasil *= angka;
//     }

//     return hasil;
// }

// let hasil1 = hitungPangkat(2, 10);
// console.log(hasil1);

// let hasil2 = hitungPangkat(3, 4);
// console.log(hasil2);

// // NO2
// function caesarCipherEncrypt(text, shift) {

//     shift = shift % 26;
//     if (shift < 0) {
//         shift += 26;
//     }

//     let result = '';

//     for (let i = 0; i < text.length; i++) {
//         let char = text[i];

//         if (char.match(/[a-z]/i)) {

//             const code = text.charCodeAt(i);

//             if (code >= 65 && code <= 90) {
//                 char = String.fromCharCode(((code - 65 + shift) % 26) + 65);
//             } else if (code >= 97 && code <= 122) {
//                 char = String.fromCharCode(((code - 97 + shift) % 26) + 97);
//             }
//         }

//         result += char;
//     }

//     return result
// }

// const plaintext = 'abc';
// const shiftAmount = 1;

// const ciphertext = caesarCipherEncrypt(plaintext, shiftAmount);
// console.log(plaintext);
// console.log(ciphertext);

// NO3
// function isPalindrome(word) {

//     const cleanedWord = word.toLowerCase().replace(/\s/g, '');
//     const reversedWord = cleanedWord.split('').reverse().join('');
//     return cleanedWord === reversedWord;
// }


// const kata1 = "malam";
// const kata2 = "apa";
// const kata3 = "131";
// const kata4 = "12321";
// const kata5 = "Kodok";
// const kata6 = "kasur ini rusak";
// const kata7 = "mobil"

// console.log(`${kata1} adalah palindrom: ${isPalindrome(kata1)}`);
// console.log(`${kata2} adalah palindrom: ${isPalindrome(kata2)}`);
// console.log(`${kata3} adalah palindrom: ${isPalindrome(kata3)}`);
// console.log(`${kata4} adalah palindrom: ${isPalindrome(kata4)}`);
// console.log(`${kata5} adalah palindrom: ${isPalindrome(kata5)}`);
// console.log(`${kata6} adalah palindrom: ${isPalindrome(kata6)}`);
// console.log(`${kata7} adalah palindrom: ${isPalindrome(kata7)}`);

// No 4
// function pengurutan(numbers) {
//     for (let i = 0; i < numbers.length - 1; i++) {
//         for (let j = 0; j < numbers.length - i; j++) {
//             if (numbers[j] > numbers[j + 1]) {
//                 let temp = numbers[j];
//                 numbers[j] = numbers[j + 1];
//                 numbers[j + 1] = temp;
//             }
//         }
//     }
//     return numbers;
// }

// const n = 5;
// const inputNumbers = [50, 20, 1, 45, 3];

// const sortedNumbers = pengurutan(inputNumbers.slice());
// console.log("Angka sebelum diurutkan : " + inputNumbers.join(', '));
// console.log("Angka setelah diurutkan : " + sortedNumbers.join(', '));

// No 5
// function angkaToBinary(angka) {
//     if (angka === 0) {
//         return 0;
//     }

//     let binary = '';
//     while (angka > 0) {
//         const remainder = angka % 2;
//         binary = remainder + binary;
//         angka = Math.floor(angka / 2);
//     }
//     return binary;
// }

// const angkaNumber = 14;
// const binaryNumber = angkaToBinary(angkaNumber);
// console.log("Angka biner dari " + angkaNumber + " adalah : " + binaryNumber);


// soal tambahan

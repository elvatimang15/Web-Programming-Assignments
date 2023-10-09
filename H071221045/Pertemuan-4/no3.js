//  Nomor 3

const text = prompt("Masukkan teks: ");
const reverseText = text.split("").reverse().join("");

console.log(reverseText);

if (text === reverseText) console.log("Teks ini adalah Teks Palindrom");
else console.log("Teks ini Bukan Teks Palindrom");

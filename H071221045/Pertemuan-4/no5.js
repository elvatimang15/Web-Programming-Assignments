// Nomor 5

// const input = parseInt(prompt("Masukkan nilai:"));

// const angkaBiner = angka(input);

// function angka(nilai) {
//   let biner = "";

//   while (nilai > 0) {
//     let sisa = nilai % 2;
//     biner = sisa + biner;
//     nilai = Math.floor(nilai / 2);
//   }

//   return biner;
// }

// alert(`Angka biner dari ${input} adalah: ${angkaBiner}`);

const number = parseInt(prompt("Masukkan angka: "));
const binary = number.toString(2);
alert(`${number} dalam biner adalah ${binary}`)

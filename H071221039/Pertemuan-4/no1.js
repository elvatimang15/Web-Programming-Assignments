// Tanpa menggunakan Math.Pow buatlah sebuah program yang mengpangkatkan sebuah angka dengan angka lain. 
// Contoh:
// 2 dan 10 akan mengeluarkan nilai 1024 
// 3 dan 4 mengeluarkan 81


// npm install prompt-sync
const prompt=require("prompt-sync")({sigint:true});

const angka = parseInt(prompt("Masukkan angka : "))
const pangkat = parseInt(prompt("Masukkan pangkat : "))

function a(angka, pangkat) {
    if (pangkat == 0) {
      return 1;
    } else {
      let hasil = angka**pangkat;
      return hasil;
    }
  }
  
  const hasilPangkat = a(angka, pangkat);
  console.log(hasilPangkat);
  
//   const hasilPangkat2 = pangkat(angka, pangkat);
//   console.log(hasilPangkat2);
  
function hitungPangkat(angka, pangkat) {
  let hasil = angka ** pangkat;
  return hasil;
}

const angka1 = 2;
const pangkat1 = 10;
console.log(`${angka1} pangkat ${pangkat1} adalah ${hitungPangkat(angka1, pangkat1)}`);

const angka2 = 3;
const pangkat2 = 4;
console.log(`${angka2} pangkat ${pangkat2} adalah ${hitungPangkat(angka2, pangkat2)}`);

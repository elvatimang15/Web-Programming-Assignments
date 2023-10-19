let numbers = []
const n = parseInt(prompt("Masukkan nilai n : "))
for (let i = 0; i < n; i++) {
    let number = parseInt(prompt(`Masukkan angka ke ${i} :`))
    numbers.push(number);
}

const panjang = numbers.length
let tukar;

do {
    tukar= false;
    for (let i = 0; i < panjang-1 ; i++) {// untuk mengatur berapa kali dia ditukar
        if (numbers[i]>numbers[i+1]) {//untuk menukar angka yang lebih kecil dengan yang besar, untuk mengurutkan
        let balik = numbers[i] //untuk mengatur tukar menukarnya
        numbers[i] = numbers[i+1]
        numbers[i+1] = balik
        tukar = true //ketika true, maka penukaran diulang terus sampai batasannya
        }
    }
} while (tukar); //biar berjalan terus perulangannya, karena tukar bernilai true

console.log(numbers.join(', '));//ubah array jadi string dengan pemisah koma

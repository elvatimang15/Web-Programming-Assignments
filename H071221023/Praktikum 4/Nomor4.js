function sortArray(array) {
    for (let i = 0; i < array.length - 1; i++) {
        for (let j = 0; j < array.length - i - 1; j++) {
            if (array[j] > array[j + 1]) {
                const temp = array[j];
                array[j] = array[j + 1];
                array[j + 1] = temp;
            }
        }
    }
}

let n = 5; 
let input = "1 3 20 45 50";

let numberArray = input.split(" ").map(Number);
if (n === numberArray.length) {
    sortArray(numberArray);
    console.log("Angka yang sudah diurutkan: " + numberArray.join(" "));
} else {
    console.log("Jumlah angka yang dimasukkan tidak sesuai!");
}



// Fungsi ini menggunakan algoritma pengurutan gelembung (bubble sort) 
// untuk mengurutkan elemen-elemen dalam array secara ascending. 
// Ini dilakukan dengan menggunakan dua loop bersarang.

// Loop pertama (i) digunakan untuk mengulang sebanyak array.length - 1 kali. 
// Ini karena setiap iterasi akan "mendorong" elemen terbesar ke ujung array, 
// sehingga tidak perlu memeriksa elemen terakhir setelah iterasi pertama, 
// elemen kedua terakhir setelah iterasi kedua, dan seterusnya.


// Loop kedua (j) digunakan untuk membandingkan dua elemen sebelah-seluruh dalam array. 
// Jika elemen ke-j lebih besar dari elemen ke-j + 1, maka kedua elemen tersebut 
// akan ditukar menggunakan variabel sementara temp.
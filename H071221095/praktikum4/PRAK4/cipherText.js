const kata = prompt("Masukkan Kata : ");
const n = parseInt(prompt("Masukkan angka : "));
const hurufAZ = "abcdefghijklmnopqrstuvwxyz";

let hasil = "";

for (let i = 0; i < kata.length; i++) {
    let karakter = kata[i];

    if (/[a-zA-Z]/.test(karakter)) { // memeriksa apakah karakter mengandung huruf lower atau upper, biar bisa dua-duanya dimasukkan
        let hurufIndeks = hurufAZ.indexOf(karakter.toLowerCase());
        if (hurufIndeks > -1) {
            let geserIndeks = (hurufIndeks + n) % 26;//agar perhitungan ttp di rentang 0 hingga 26, tidak ke 27 dst.
            if (geserIndeks < 0) {
                geserIndeks += 26;//memastikan kalau kita melakukan pergeseran ke kiri, nilainya ditambah 26 sehingga tdk menjadi minus
            }
            let hurufGeser = hurufAZ[geserIndeks];//ambil huruf dari hurufAZ yang sudah mi digeser, dimasukkan ke huruf geser

            if (karakter = karakter.toUpperCase()) {
                hurufGeser = hurufGeser.toLowerCase();//untuk mengembalikan dia ke bentuk asalnya, yg tadi lower jadi lower, upper jadi upper
            }

            if (karakter = karakter.toLowerCase()) {
                hurufGeser = hurufGeser.toUpperCase();//untuk mengembalikan dia ke bentuk asalnya, yg tadi lower jadi lower, upper jadi upper
            }

            karakter = hurufGeser;
        }
    }

    hasil += karakter;
}
console.log(hasil);


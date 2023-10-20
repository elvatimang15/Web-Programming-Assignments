function palindrom(kata) {
    if (typeof kata === 'string') {  // menggunakan typeof apakah kata adalah sebuah string atau bukan.
        let hasil = kata === kata.split('').reverse().join('');
        if (hasil) {
            console.log(`${kata} adalah kata palindrom`);
        } else {
            console.log(`${kata} bukan kata palindrom`);
        }
    } else {
        let angkaString = kata.toString();
        let hasil = angkaString === angkaString.split('').reverse().join('');
        if (hasil) {
            console.log(`${angkaString} adalah kata palindrom`);
        } else {
            console.log(`${angkaString} bukan kata palindrom`);
        }
    }
}

let kata = "malam";
palindrom(kata);

kata = 'apa';
palindrom(kata);

kata = 131;
palindrom(kata);

kata = 12321;
palindrom(kata);

kata = 'kodok';
palindrom(kata);

kata = 'kasur ini rusak';
palindrom(kata);

kata = 1.1;
palindrom(kata);

kata = "saya makan nasi";
palindrom(kata)


// Jika kata adalah sebuah string,
// maka fungsi akan membalikkan kata dengan mengubahnya menjadi sebuah array karakter dengan split(''), 
// membalikkan array tersebut dengan reverse(), 
// dan kemudian menggabungkannya kembali menjadi string dengan join(''). 
// hasilnya akan dibandingkan dengan kata asli, dan jika kedua string tersebut sama, 
// maka kata adalah sebuah palindrom.


// Jika kata adalah sebuah angka, maka fungsi akan mengubah angka tersebut menjadi string 
// dengan toString(), dan kemudian melakukan langkah-langkah 
// yang sama untuk memeriksa apakah angka tersebut adalah palindrom atau bukan.
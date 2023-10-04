function hitungPangkat(angka, pangkat) {
    if (pangkat === 0) {
        return 1;
    }

    let hasil = 1;
    for (let i = 1; i <= pangkat; i++) {
        hasil *= angka;
    }

    return hasil;
}

let hasil1 = hitungPangkat(2, 10);
console.log(hasil1); 

let hasil2 = hitungPangkat(3, 4);
console.log(hasil2); 

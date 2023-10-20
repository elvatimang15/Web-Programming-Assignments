let angka = parseInt(prompt('Masukkan angka = '))
let pangkat = parseInt(prompt('Masukkan pangkat = '))

let hasil = 1 //variabel untuk menampung hasilnya nanti, jadi apapun hasilnya akan tetap angka itu sendiri karen dikali 1

for (let index = 0; index < pangkat; index++) {//index dimulai dari nol itu untuk perulangan, index<pangkat untuk batasan perulangan pangkatnya, jadi klo 4 kai berarti empat kali dikalikan, index++ bertambah teruski indexnnya
    hasil *= angka; //supaya berkali-kali sesuai dengan batasa pangkatnya
}

console.log(hasil);
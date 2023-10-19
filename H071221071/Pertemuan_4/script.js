// 1

let a = parseInt(prompt("Masukkan angka pertama :"))
let b = parseInt(prompt("Masukkan angka pangkat :"))
let c = a**b

alert(c)
  
//   2

let karakter = prompt("Masukkan inputan : ").split("");
let geser = parseInt(prompt("angka untuk geser setiap huruf "))

let new_karakter = ""

for (let i of karakter) {
    if (/[a-z]/.test(i)) {
        new_karakter += String.fromCharCode((((i.charCodeAt(0) + geser - 97) % 26) + 97))
    } else if (/[A-Z]/.test(i)) {
        new_karakter += String.fromCharCode((((i.charCodeAt(0) + geser - 65) % 26) + 65))
    } else {
        new_karakter += " "
    }
}

alert(new_karakter);


//   3

let text = prompt("Kata : ").toLocaleLowerCase();
let reverse = "";

for (let i of text) {
    reverse = i + reverse;
}

if (reverse === text) {
    alert("Palindrom");
} else {
    alert("Bukan");
}

//   4
let list = prompt("Masukkan angka dengan pemisah spasi").split(" ").map((str) => parseInt(str))

for (let i in list){
    for (let j = 0; j < list.length; j++) {
        if (list[j] > list[j + 1]) {
            let temporary = list[j]
            list[j] = list[j + 1]
            list[j + 1] = temporary
        }
    }
}

alert(list)

//   5

let angka = parseInt(prompt("Masukkan Angka : "))
let binary = ""

while (true){
    binary = String(angka % 2) + binary
    angka = Math.floor(angka / 2)
    if (angka === 0) {
        break
    } 
}

alert(binary)
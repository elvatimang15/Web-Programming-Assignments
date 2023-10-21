function convertToBinary(num) {
    let result = '';
    while (num > 0) {
        result = (num % 2) + result;
        num = Math.floor(num / 2);
    }
    return result;
}

let input = prompt("Masukkan bilangan desimal:");
let decimalNumber = parseInt(input);
let binaryResult = convertToBinary(decimalNumber);
console.log(`Konversi ${decimalNumber} ke bilangan biner: ${binaryResult}`);

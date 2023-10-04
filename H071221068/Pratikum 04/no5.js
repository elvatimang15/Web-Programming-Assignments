function toBinary(number) {
    return number.toString(2);
}

const input = prompt("Masukkan angka bulat:");

const parsedInput = parseInt(input, 10);

if (!isNaN(parsedInput) && Number.isInteger(parsedInput)) {
    const binaryResult = toBinary(parsedInput);

    console.log(`Angka bulat ${parsedInput} dalam bentuk biner: ${binaryResult}`);
} else {
    console.log("Masukkan yang Anda berikan bukanlah angka bulat.");
}

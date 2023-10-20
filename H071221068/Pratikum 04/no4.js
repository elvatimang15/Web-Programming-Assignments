function mengurutkan(numbers) {
    for (let i = 0; i < numbers.length - 1; i++) {
        for (let j = 0; j < numbers.length - i - 1; j++) {
            if (numbers[j] > numbers[j + 1]) {
                let temp = numbers[j];
                numbers[j] = numbers[j + 1];
                numbers[j + 1] = temp;
            }
        }
    }
    return numbers;
}

const n = parseInt(prompt("Masukkan jumlah angka:"));

const inputNumbers = [];

for (let i = 0; i < n; i++) {
    const angka = parseInt(prompt(`Masukkan angka ke-${i + 1}:`));
    inputNumbers.push(angka);
}

const sortedNumbers = mengurutkan(inputNumbers.slice()); 


console.log(`Angka sebelum diurutkan: ${inputNumbers.join(', ')}`);
console.log(`Angka setelah diurutkan: ${sortedNumbers.join(', ')}`);

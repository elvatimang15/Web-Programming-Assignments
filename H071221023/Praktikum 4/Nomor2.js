function cipherText(kata, n) {
    const alphabet = 'abcdefghijklmnopqrstuvwxyz';
    const nAlphabet = alphabet.slice(n) + alphabet.slice(0, n);
    const hasil = [];

    for (let i = 0; i < kata.length; i++) {
        const huruf = kata[i];
        const hurufKapital = huruf === huruf.toUpperCase();

        const hurufKecil = huruf.toLowerCase();
        const indexAlphabet = alphabet.indexOf(hurufKecil);

        if (indexAlphabet !== -1) {
            let nHuruf = nAlphabet[indexAlphabet];

            if (hurufKapital) {
                nHuruf = nHuruf.toUpperCase();
            }

            hasil.push(nHuruf);
        } else {
            hasil.push(huruf);
        }
    }

    return hasil.join('');
}

let text = "abc";
let geser = 1;
console.log(cipherText(text, geser));

let text1 = "Indonesia";
let geser1 = 13;
console.log(cipherText(text1, geser1));
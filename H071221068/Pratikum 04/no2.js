function caesarCipherEncrypt(text, shift) {

    shift = shift % 26;
    if (shift < 0) {
        shift += 26;
    }

    let result = '';

    for (let i = 0; i < text.length; i++) {
        let char = text[i];

        if (char.match(/[a-z]/i)) {

            const code = text.charCodeAt(i);

            if (code >= 65 && code <= 90) {
                char = String.fromCharCode(((code - 65 + shift) % 26) + 65);
            } else if (code >= 97 && code <= 122) {
                char = String.fromCharCode(((code - 97 + shift) % 26) + 97);
            }
        }

        result += char;
    }

    return result;
}

const plaintext = 'Indonesia';
const shiftAmount = 13;

const ciphertext = caesarCipherEncrypt(plaintext, shiftAmount);
console.log(`Plaintext: ${plaintext}`);
console.log(`Ciphertext (Shift ${shiftAmount}): ${ciphertext}`);

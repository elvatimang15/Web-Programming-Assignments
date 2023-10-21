function caesarCipher(text, n) {
    let result = '';
  
    for (let i = 0; i < text.length; i++) {
      let charCode = text.charCodeAt(i);
  
      if (charCode >= 65 && charCode <= 90) { // Huruf besar (A-Z)
        result += String.fromCharCode(((charCode - 65 + n) % 26) + 65);
      } else if (charCode >= 97 && charCode <= 122) { // Huruf kecil (a-z)
        result += String.fromCharCode(((charCode - 97 + n) % 26) + 97);
      } else {
        result += text[i];
      }
    }
  
    return result;
  }
  
  const plaintext = prompt("Masukkan teks yang akan dienkripsi: ");
  const shift = parseInt(prompt("Masukkan jumlah pergeseran (n): "));
  const ciphertext = caesarCipher(plaintext, shift);
  
  console.log(`Teks Asli: ${plaintext}`);
  console.log(`Pergeseran: ${shift}`);
  console.log(`Teks Terenkripsi: ${ciphertext}`);
  
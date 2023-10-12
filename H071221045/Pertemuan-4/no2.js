// Nomor 2

function Cipher(text, shift) {
    return text.replace(/[a-zA-Z]/g, function (char) {
      let baseCharCode = char.charCodeAt(0) <= 90 ? 65 : 97;
      let encryptedCharCode =
        ((char.charCodeAt(0) - baseCharCode + shift) % 26) + baseCharCode;
      return String.fromCharCode(encryptedCharCode);
    });
  }
  
  let inputtext = prompt("Masukkan teks:");
  let tukar = parseInt(prompt("Masukkan nilai untuk menukar:"));
  
  let hasil = Cipher(inputtext, tukar);
  
  alert(`The encrypted text is: ${hasil}`);
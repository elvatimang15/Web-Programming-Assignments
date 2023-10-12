// Nomor 4

function bubbleSort(arr) {
    let len = arr.length;
    let swapped;
    do {
      swapped = false;
      for (let i = 0; i < len - 1; i++) {
        if (arr[i] > arr[i + 1]) {
          let temp = arr[i];
          arr[i] = arr[i + 1];
          arr[i + 1] = temp;
          swapped = true;
        }
      }
    } while (swapped);
  }
  
  function main() {
    let n = parseInt(prompt("Masukkan jumlah n:"));
    let angka = [];
  
    for (let i = 0; i < n; i++) {
      let nilai = parseInt(prompt(`Masukkan nilai n ke-${i + 1}:`));
      angka.push(nilai);
    }
  
    bubbleSort(angka);
  
    alert(`Daftar yang terurut: ${angka.join(", ")}`);
  }
  
  main();
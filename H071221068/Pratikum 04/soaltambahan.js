//buat array yang berisi nilai random sebanyak seratus lalu harus dibagi dengan dua 
//array dimana dengan ketentuan pembeda array yang satu dengan yang lain adalah indexnya apabila index genap di satukan di array yang sama
//apabila index ganjil di array selanjutnya lalu setiap array buat 
//output menambahkan semua nilai lalu tentukan max dalam array nya dan tentukan min arraynya

function RandomArray(length) {
    return Array.from({ length: length }, () => Math.floor(Math.random() * 100));
  }
  
  function PisahArray(arr) {
    const evenIndexesArray = arr.filter((value, index) => index % 2 === 0);
    const oddIndexesArray = arr.filter((value, index) => index % 2 !== 0);
    return [evenIndexesArray, oddIndexesArray];
  }
  
  function menghitungarray(arr) {
    const total = arr.reduce((acc, val) => acc + val, 0);
    const max = Math.max(...arr);
    const min = Math.min(...arr);
    return { total, max, min };
  }
  
  const randomValues = RandomArray(100);
  const [evenIndexesArray, oddIndexesArray] = PisahArray(randomValues);
  
  const evenIndexesStats = menghitungarray(evenIndexesArray);
  const oddIndexesStats = menghitungarray(oddIndexesArray);
  
  console.log("Array nilai acak:", randomValues);
  console.log("Array dengan index genap:", evenIndexesArray);
  console.log("Array dengan index ganjil:", oddIndexesArray);
  
  console.log("\nHasil untuk array dengan index genap:");
  console.log("Total:", evenIndexesStats.total);
  console.log("Maksimum:", evenIndexesStats.max);
  console.log("Minimum:", evenIndexesStats.min);
  
  console.log("\nHasil untuk array dengan index ganjil:");
  console.log("Total:", oddIndexesStats.total);
  console.log("Maksimum:", oddIndexesStats.max);
  console.log("Minimum:", oddIndexesStats.min);
  



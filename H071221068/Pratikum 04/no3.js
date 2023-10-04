function isPalindrome(word) {

    const cleanedWord = word.toLowerCase().replace(/\s/g, '');


    const reversedWord = cleanedWord.split('').reverse().join('');


    return cleanedWord === reversedWord;
}


const kata1 = "malam";
const kata2 = "apa";
const kata3 = "131";
const kata4 = "12321";
const kata5 = "Kodok";
const kata6 = "kasur ini rusak";
const kata7 = "mobil"

console.log(`${kata1} adalah palindrom: ${isPalindrome(kata1)}`);
console.log(`${kata2} adalah palindrom: ${isPalindrome(kata2)}`);
console.log(`${kata3} adalah palindrom: ${isPalindrome(kata3)}`);
console.log(`${kata4} adalah palindrom: ${isPalindrome(kata4)}`);
console.log(`${kata5} adalah palindrom: ${isPalindrome(kata5)}`);
console.log(`${kata6} adalah palindrom: ${isPalindrome(kata6)}`);
console.log(`${kata7} adalah palindrom: ${isPalindrome(kata7)}`);

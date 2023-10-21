let text = prompt('Masukkan text')

let arrayText = text.split('');

let reverseArrayText = arrayText.reverse()

if (text == reverseArrayText.join('')) {
    alert('palindrom');
} else {
    alert('bukan palindrom');
}
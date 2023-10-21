function sortingNumber(array) {
    for (let j = 0; j < array.length; j++) {
        for (let k = 0; k < array.length; k++) {
            if (array[j] < array[k]) {
                let temp = array[j];
                array[j] = array[k];
                array[k] = temp;
            }
        }
    }
    return array;
}

console.log(sortingNumber([5, 3, 7, -1, 9, 2, 2, 4, 6, 10]));

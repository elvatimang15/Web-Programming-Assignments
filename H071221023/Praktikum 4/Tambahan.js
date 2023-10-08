function splitMe(input) {
  const specialChars = [',', '$', '#'];
  const result = [];

  let currentSubArray = [];
  for (let i = 0; i < input.length; i++) {
    const char = input[i];

    if (specialChars.includes(char)) {
      if (currentSubArray.length > 0) {
        result.push(currentSubArray);
        currentSubArray = [];
      }
    } else {
      currentSubArray.push(char);
    }
  }

  if (currentSubArray.length > 0) {
    result.push(currentSubArray);
  }

  return result;
}

const input = "aqrst,ukaei,ffooo";
const output = splitMe(input);
console.log(output);
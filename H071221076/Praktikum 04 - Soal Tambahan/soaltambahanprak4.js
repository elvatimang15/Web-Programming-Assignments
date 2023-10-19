function cleanAndSortStudents(studentList) {
    if (studentList.length === 0) {
        return "Maaf, tidak ada student";
    }

    let uniqueStudents = [];
    for (let student of studentList) {
        if (!uniqueStudents.includes(student)) {
            uniqueStudents.push(student);
        }
    }
    uniqueStudents.sort();

    return uniqueStudents;
}

const input1 = ["Jack", "Jekyll", "Jeff", "Jack", "Tom", "Alfred", "Alfred", "Tom"];
const hasil1 = cleanAndSortStudents(input1);
console.log(hasil1);

const input2 = [];
const hasil2 = cleanAndSortStudents(input2);
console.log(hasil2);

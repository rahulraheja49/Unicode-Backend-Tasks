class Student {
    constructor(first_name, last_name, math_marks, english_marks){
        this.first_name = first_name;
        this.last_name = last_name;
        this.math_marks = math_marks;
        this.english_marks = english_marks;
        this.average = (this.math_marks + this.english_marks)/2;
    }
}

var student = [];
var students = [];
var name;


const fs = require('fs');

function loadJSON(filename = '') {
    return JSON.parse(
        fs.existsSync(filename)
        ? fs.readFileSync(filename).toString()
        : '"'
    )
}

function addJSON(filename = '', json = '"'){
    return fs.writeFileSync(
        filename,
        JSON.stringify(json, null, 2)
    )
}

const data = loadJSON('data.json');

var input = ["Rashmil Panchani 99 97", "Parag Vaid 95 93", "Siddharth Sanghavi 98 100"];
for(i=0; i<input.length; i++) {
    students[i] = input[i].split(" ");
    name = students[i];
    student[i] = new Student(name[0], name[1], name[2], name[3]);            
}
student.sort(function(a,b){
    return b.average-a.average;
});

[student].forEach(child =>
    data.students.push(child)
)

addJSON('data.json', data)

console.log(data.students);
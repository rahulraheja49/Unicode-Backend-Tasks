

var first_name = new Array();
var last_name = new Array();
var math_marks = new Array();
var english_marks = new Array();


class Student {
    constructor(first_name, last_name, math_marks, english_marks){
        this.first_name = first_name;
        this.last_name = last_name;
        this.math_marks = math_marks;
        this.english_marks = english_marks;
        this.average = (this.math_marks + this.english_marks)/2;
    }
}

var input = ["Rashmil Panchani 99 97", "Parag Vaid 95 93", "Siddarth Sanghvi 98 100"];
var student = [];
var students = [];
var name;

function sortStudents(input) {
    for(i=0; i<input.length; i++) {
        students[i] = input[i].split(" ");
        name = students[i];
        student[i] = new Student(name[0], name[1], name[2], name[3]);            
    }
    student.sort(function(a,b){
        return b.average-a.average;
    });
    console.log('[');
    for(i=0; i<(input.length-1); i++) {
        console.log(`{\n    Name: ${student[i].first_name} ${student[i].last_name}\n        Score: {\n          Maths: ${student[i].math_marks},\n          English: ${student[i].english_marks}\n        }\n},`);
    }   
    console.log(']');
}

sortStudents(input);
// let arr = [1,2,3,4,5,"Tasi","Messi","Neha"];

// for(let a of arr){
//     console.log(a);
// }

// for(let a in arr){
//     console.log(`${a} index value : ${arr[a]}`)
// }

// let car = new Array("Lambo","Porsche","Creta")

// console.log(car[2]);

// for(let i = 0; i<car.length; i++)
// {
//     console.log(car[i]);
// }


// let arr = ["Tasi","Neha","Namrata"];
// arr.pop();
// console.log(arr);

// arr.push("Messi");
// console.log(arr);

// let removedElement =  arr.shift();
// console.log(removedElement);
// console.log(arr)

// arr.unshift("Messi");
// console.log(arr);



// let students = ["Tasi","Neha","Namrata"];

// let student = prompt("Enter the name of student to be removed");
// let index = students.indexOf(student);
// if(index>-1){
//     const removedElement = students.splice(index,1); //(start index, no. of element to remove)
//     console.log("Successfully removed: "+removedElement);
//     console.log("Remaining array after deleting: "+students);
// }else{
//     console.log("There is no element in the array named "+student);
// }



// let alphabets = ['A', 'B', 'C', 'd', 'F'];
// let sum = 0;
// for(let i =0; i<alphabets.length; i++){
//     alphabets[i].toLowerCase();
//     let ASCII = alphabets[i].charCodeAt(0);
//     sum+=ASCII;
// }



// let alphabets1 = ['A', 'B', 'C', 'd', 'F'];
// let sum2;
// for(let i =0; i<alphabets.length; i++){
//     alphabets[i].toLowerCase();
//     let ASCII = alphabets[i].charCodeAt(0);
//     sum2+=ASCII;
// }

// console.log(sum);
// console.log(sum2);


// const arr = [10, 20, 30, 40, 50];

// const slicedArr = arr.slice(1, 4); // from index 1 to 3 (4 excluded)
// console.log(slicedArr); // [20, 30, 40]
// console.log(arr);       // Original array remains unchanged: [10, 20, 30, 40, 50]


// const arr1 = arr.join(" ");
// console.log(arr1);

// const arr2 = arr.join("-");
// console.log(arr2);

// const arr3 = arr.join();
// console.log(arr3);


// const obj = {name: "Alice",
//      age: 25};

// console.log(obj.toString()); // "[object Object]"


// const arr = [1, 2, 3, 4];

// const str = arr.toString();
// console.log(str); // "1,2,3,4"

const obj = {
  name: "Alice",
  age: 25,
  toString() {
    return `Name: ${this.name}, Age: ${this.age}`;
  }
};

console.log(obj.toString()); // "Name: Alice, Age: 25"

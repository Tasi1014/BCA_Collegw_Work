//Check if positive or not

// let num = prompt("Enter a number: ")

// if(num>0){
//     console.log(`${num} is a Positive Number`);
// }else if(num<0){
//     console.log(`${num} is a negative number`)
// }else{
//     console.log("Number is Zero")
// }

//Find the greatest between 3 numbers

// const num1 = prompt("Enter 1st number: ");
// const num2 = prompt("Enter 2nd number: ");
// const num3 = prompt("Enter 3rd number: ");

// if(num1 === num2 && num2 === num3){
//     console.log("All the numbers are equal!");
// }else if(num1>num2 && num1>num3){
//     console.log(`${num1} is the Greatest number!`)
// }else if(num2>num3){
//     console.log(`${num2} is the Greatest number`);
// }else{
//     console.log(`${num3} is the Greatest number`);
// }

//Check if the given number is odd or even

// const num = prompt("Enter a number: ")

// if(num%2 == 0){
//     console.log(`${num} is an Even number`);
// }else{
//     console.log(`${num} is an Odd number`);
// }

//check if the number is divisible by 11 or not

// const num = prompt("Enter a number: ")

// if(num%11 == 0)
// {
//     console.log(`${num} is divisible by 11`);
// }else{
//     console.log(`${num} is not divisible by 11`);
// }

//Switch

const num1 = Number(prompt("Enter 1st number: "));
const num2 = Number(prompt("Enter 2nd number: "));

const expression = prompt("Enter an expression");

switch (expression) {
  case "+":
    let sum = num1 + num2;
    console.log(`The sum of ${num1} and ${num2} is ${sum}  `);
    break;

  case "-":
    let diff = num1 - num2;
    console.log(`The  Difference  of ${num1} and ${num2} is ${diff}  `);
    break;

  case "/":
    if (num2 === 0) {
      console.log("Error division! Cannot divide a number by zero!");
    } else {
      let div = num1 / num2;
      console.log(`The division of ${num1} and ${num2} is ${div}  `);
    }
    break;

  case "*":
    let multiplication = num1 * num2;
    console.log(
      `The Multiplication of ${num1} and ${num2} is ${multiplication}  `
    );
    break;

  default:
    console.log(
      "Envalid input! Please input one of these expression(+ , - , / , *)"
    );
}

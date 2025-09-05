//Functions are reuseable block of code designed to perform a specific task

//Syntax:
// function functionName(){
//     //Block of code to execute
// }


// function sayHello(){
//     alert("Hello World!")
// }

// sayHello();

// function sum(a,b){
//     return a+b;
// }


// let result = sum(10,20);

// alert(`The sum of 10 and 20 is ${result}`);


// function multiply(multiplicand, multiplier){
//     return multiplicand * multiplier;
// }

// let result = multiply(5,10);
// alert(`The multiplication of 5 and 10 is ${result}`);
  





//anonymus function

// let mssg = function(){
//     console.log("Anonymus function");
// }

// mssg();



// function squareFinder(n){
//     return n*n;
// }

// let result = squareFinder(5);
// console.log(`Square of 5 is ${result}`);
// alert(`The square of 5 is ${result}`);


// const input = Number(prompt("Enter a number: "));

// for(i =1; i<=10; i++){
//     console.log(input+" x "+i+"= "+ input*i);
// }


// const person = {  //const lae person object ko reference lai modify garna didaina..not its value as key pairs
//     Name : "Tasi",
//     Age : 20,
//     Address : {
//         city : "Kathmandu",
//         StreeNo : 19
//     }
// }

// console.log(person.Address.city);



// const user = {
// first_Name : "Tasi",
//     last_Name : "Sherpa",
//     Age : 20,
//     Address : {
//         city : "Kathmandu",
//         email : "tasisherpa10@gmail.com",
//         phone : 9803901467
//     }
// }
// console.log(user.first_Name);
// console.log(user["last_Name"]);
// console.log(user.Address.city);
// user.Address.city = "Bhaktapur";
// console.log(user.Address.city);
// user.Address.streeNo = 19;

// console.log(user.Address.streeNo)

// delete user.Age;
// delete user.Addresuphone;

// console.log(user);



// console.log(new Date().getFullYear());


// let myDate = new Date(2021, 7,12,8,45,20,2000);

// console.log("Year "+myDate.getFullYear());
// console.log("Month: "+myDate.getMonth());
// console.log("Day: "+myDate.getDay());
// console.log("Hours: "+myDate.getHours());
// console.log("Minutes "+myDate.getMinutes());
// console.log("Milliseconds: "+myDate.getMilliseconds());

// let d = new Date();
// d.setFullYear(2024,3,13);
// console.log(new Date(d));




//1. Check if the given date is past or future
//2. Find the next Friday from today
//3. Calculate the difference in days between two dates
//4. Check if two dates are same day or not.(excluding time)



//soln 1
//let d = new Date();
// d.setFullYear(2026,4,3);

// let currTime = new Date();

// if(d < currTime){
//     console.log("Given date is past");
// }else if (d> currTime){
//     console.log("Given date is Future")
// }else{
//     console.log("Given date is Today!");
// }


//soln2 

// let currentDate = new Date();
// switch(currentDate.getDay())
// {
//     case 0 : console.log("Today is Sunday and Friday is after 4 days");
//     break;
//     case 1 : console.log("Today is Monday and Friday is after 3 days");
//     break;
//     case 2 : console.log("Today is Tuesday and Friday is after 2 days");
//     break;
//     case 3 : console.log("Today is Wednesday and Friday is after 1 days");
//     break;
//     case 4 : console.log("Today is Thursday and Friday is tommorow");
//     break;
//     case 5 : console.log("Today is Friday");
//     break;
//     case 6 : console.log("Today is Saturday and Friday is after 5 days");
//     break;

// }

// let today = new Date();
// let day = today.getDay(); // 0 = Sunday ... 5 = Friday
// let daysUntilFriday = (5 - day + 7) % 7 || 7;
// let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
// let todayName = days[day];

// console.log("Today is " + todayName + " and Friday is after " + daysUntilFriday + " day(s).");



//soln 3

// let date1 = new Date();
// let date2 = new Date(2025, 8, 15); // Sep 15, 2025
// let diffTime = Math.abs(date2 - date1); // difference in milliseconds
// let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
// console.log("Difference in days:", diffDays);


// soln 4

// let date1 = new Date();
// let date2 = new Date(2025,4,9);

// if(date1.getFullYear() === date2.getFullYear() &&
//     date1.getMonth() === date2.getMonth() &&
//     date1.getDate() === date2.getDate()){
//     console.log("Both dates are on the same day");
// }else{
//     console.log("The dates are on different days");
// }

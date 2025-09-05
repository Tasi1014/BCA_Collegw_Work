// const input  = document.getElementById("input");
// const btn = document.getElementById("btn");

// btn.addEventListener("click",()=>{
//     let str = input.value;
//     let arr = str.split("");
//     let reverse = arr.reverse().join("");
//     if(str === reverse){
//         const p = document.createElement("p");
//         p.textContent = `${str} is a palindrome String`;
//         document.body.appendChild(p);
//     }else{
//         const p = document.createElement("p");
//         p.textContent = `${str} is not a palindrome String`;
//         document.body.appendChild(p);
//     }
// });



const input  = document.getElementById("input");
const btn = document.getElementById("btn");

btn.addEventListener("click",()=>{
    let str = input.value;
    let reverse = "";
    let i;
    for(i = str.length-1 ; i>=0; i--){
        reverse+= str.charAt(i);
    }

    if(str === reverse){
        const p = document.createElement("p");
        p.textContent = `${str} is a palindrome String`;
        document.body.appendChild(p);
    }else{
         const p = document.createElement("p");
        p.textContent = `${str} is not a palindrome String`;
        document.body.appendChild(p);
    }

    console.log(reverse)
});

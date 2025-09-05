const btn = document.getElementById("btn");
const mssg = document.getElementById("container")


// btn.addEventListener("click",()=>{
//     mssg.innerText = "Hello World";
//     mssg.style.backgroundColor = "blue";
//     mssg.style.color = "red";
//     mssg.style.fontSize = "40px";
//     mssg.style.fontFamily = "sans-serif";
//     mssg.style.height = "300px";
//     mssg.style.width = "300px";
// });

btn.addEventListener("click",()=>{
    const button = document.createElement("button");
    button.textContent = "Click me";
    document.body.appendChild(button);
    button.style.backgroundColor = "blue";
    button.style.fontSize = "20px";
    button.style.margin = "20px";
    button.style.border = "none";
    button.style.borderRadius = "10px";
})



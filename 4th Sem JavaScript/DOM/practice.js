const main = document.createElement("div");
document.body.appendChild(main);
main.style.height = "500px";
main.style.width = "500px";
main.style.border = "2px solid black";

const head = document.createElement("div");
head.textContent = "Car Header";
main.appendChild(head);
head.style.height = "100px";
head.style.width = "100%"
head.style.borderBottom = "2px solid black";
head.style.display = "flex";
head.style.justifyContent = "center";
head.style.alignItems = "center";

const content = document.createElement("div");
content.textContent = "Card main Content";
main.appendChild(content);
content.style.height = "300px";
content.style.width = "100%";
content.style.borderBottom = "2px solid black";
content.style.display = "flex";
content.style.justifyContent = "center";
content.style.alignItems = "center";

const footer = document.createElement("div");
footer.textContent = "Card Footer";
main.appendChild(footer);
footer.style.height = "100px";
footer.style.width = "100%"
footer.style.display = "flex";
footer.style.justifyContent = "center";
footer.style.alignItems = "center";

const button = document.createElement("button");

button.textContent = "Add more Card";
document.body.appendChild(button);
button.style.marginTop = "20px";


button.addEventListener("click",()=>{
    const main = document.createElement("div");
document.body.appendChild(main);
main.style.height = "500px";
main.style.width = "500px";
main.style.border = "2px solid black";
main.style.marginTop = "20px";

const head = document.createElement("div");
head.textContent = "Car Header";
main.appendChild(head);
head.style.height = "100px";
head.style.width = "100%"
head.style.borderBottom = "2px solid black";
head.style.display = "flex";
head.style.justifyContent = "center";
head.style.alignItems = "center";

const content = document.createElement("div");
content.textContent = "Card main Content";
main.appendChild(content);
content.style.height = "300px";
content.style.width = "100%";
content.style.borderBottom = "2px solid black";
content.style.display = "flex";
content.style.justifyContent = "center";
content.style.alignItems = "center";

const footer = document.createElement("div");
footer.textContent = "Card Footer";
main.appendChild(footer);
footer.style.height = "100px";
footer.style.width = "100%"
footer.style.display = "flex";
footer.style.justifyContent = "center";
footer.style.alignItems = "center";

})

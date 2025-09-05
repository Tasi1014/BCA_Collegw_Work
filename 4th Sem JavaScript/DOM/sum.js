const formSubmit = document.getElementById("sumForm");
const err1 = document.getElementById("error1");
const err2 = document.getElementById("error2");
const result = document.getElementById("result")

formSubmit.addEventListener("submit",function(e){
    e.preventDefault();
    let isFromValid = true;
     const n1 = Number(document.getElementById("n1").value);
    const n2 = Number(document.getElementById("n2").value);
    if(n1 == ""){
        err1.textContent = "Please enter a valid Number"
        isFromValid = false;
    }else if(n1 < 0){
        err1.textContent = "Please enter a postitive number";
        isFromValid = false;
    }else{
        err1.textContent = "";
        isFromValid = true;
    }

    if(n2 == ""){
        err2.textContent = "Please enter a valid Number"
        isFromValid = false;
    }else if(n2 < 0){
        err2.textContent = "Please enter a postitive number";
        isFromValid = false;
    }else{
        err2.textContent = "";
        isFromValid = true;
    }

    if(isFromValid){
        const sum = n1 +n2;
        result.textContent = `The sum of ${n1} and ${n2} is ${sum}`;
    }else{
        result.textContent = "Error"
    }


})
const e1 = document.getElementById("error1");
const e2 = document.getElementById("error2");


const form = document.getElementById("form");

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    const username = document.getElementById("userName").value;
    const password = document.getElementById("pw").value;


    let isFormValid = true;
    if(username.trim() === ""){
        e1.textContent = "UserName cannnot be set Empty";
        isFormValid = false;
    }else if (username.includes(" ")) {
        e1.textContent = "Username cannot contain spaces";
        isFormValid = false;
    }else if(username.length <3 || username.length >13){
        e1.textContent = "UserName Should at least be of 3 characters and at max 13 characters";
        isFormValid = false;
    }else{
        e1.textContent = "";
    }

    if(password.trim() === ""){
        e2.textContent = "Password Cannot be set Empty";
        isFormValid = false;
    }
    else if(password.length < 8){
        e2.textContent = "Password should be of at least 8 characters";
        isFormValid = false;
    }else{
        e2.textContent = "";
    }

    if(isFormValid){
        const mssg = document.getElementById("result");
        mssg.textContent = "Login SuccessFull";
    }else{
         const mssg = document.getElementById("result");
        mssg.textContent = "Login Failed!";
    }


    
})
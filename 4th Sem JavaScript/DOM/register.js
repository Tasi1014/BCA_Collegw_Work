const form =  document.getElementById("Form");

form.addEventListener("submit",(e)=>{
    e.preventDefault();
   const userName = document.getElementById("userName").value;
   const email = document.getElementById("email").value;
   const pw = document.getElementById("pw").value;
   const rePw = document.getElementById("re-pw").value;

   const error1 = document.getElementById("err1");
   const error2 = document.getElementById("err2");
   const error3 = document.getElementById("err3");
   const error4 = document.getElementById("err4");
   const result = document.getElementById("result");


   const userNameRegex = /^[A-Za-z]+$/

   //Validation part
   let isFormValid = true
   if(userName.trim() === ""){
    error1.textContent = "Username cannot be set empty";
    isFormValid = false;
   }else if(!userNameRegex.test(userName.trim())){
    error1.textContent = "Only alphabets are allowed for Username"
    isFormValid = false;
   }else if(userName.length < 3 || userName.length >15 ){
    error1.textContent = "Username cannot be less than 3 and greater than 15";
    isFormValid = false;
   }else{
    error1.textContent = "";
   }

   let emailRegex = /^[a-z0-9_\-\.]+[@][a-z]+[\.][a-z]{2,3}[\.]?[a-z]{0,3}$/;
   //Password must be at least 8 chars, include uppercase, lowercase, number, and special characters
   let regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%!]).{8,}$/;

   if(email.trim() === ""){
    error2.textContent = "Email cannot be set Empty";
    isFormValid = false;
   }else if(!emailRegex.test(email)){
    error2.textContent = "Email is in invalid format!";
    isFormValid = false;
   }else{
    error2.textContent = "";
   }

   if(pw === ""){
    error3.textContent = "Password cannot be empty";
    isFormValid = false;
   }else if(!regexPassword.test(pw)){
    error3.textContent = "Password is invalid it should contain at least 8 chars, include uppercase, lowercase, number, and special characters";
    isFormValid = false;
   }
   else if(pw.length < 8){
    error3.textContent = "Password is too weak";
    isFormValid = false;
   }else{
    error3.textContent = "";
   }


   if(rePw === ""){
    error4.textContent = "Re-pw Cannot be set empty";
   }
   else if(rePw !== pw){
    error4.textContent = "Re-pw should match with password"
    isFormValid = false;
   }else{
    error4.textContent = "";
   }
   if(isFormValid){
    result.textContent = "Registered Succesfully";
   }else{
    result.textContent = "Registration Failed";
   }

})
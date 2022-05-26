const pswrdField2 = document.querySelector(".pass"),
toggleIcon2 = document.querySelector(".eye");

toggleIcon2.onclick = () =>{
  if(pswrdField2.type === "password"){
    pswrdField2.type = "text";
    toggleIcon2.classList.add("active");
  }else{
    pswrdField2.type = "password";
    toggleIcon2.classList.remove("active");
  }
}

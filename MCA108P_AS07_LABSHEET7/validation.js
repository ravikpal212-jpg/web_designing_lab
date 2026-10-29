function validateRegistration(){
 const name=document.getElementById("name").value.trim();
 const email=document.getElementById("email").value.trim();
 const password=document.getElementById("password").value;
 if(name.length<2){alert("Enter a valid name.");return false;}
 if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){alert("Enter a valid email.");return false;}
 if(password.length<6){alert("Password must be at least 6 characters.");return false;}
 return true;
}
function validateCheckout(){
 const name=document.getElementById("shipname").value.trim();
 const pin=document.getElementById("pin").value.trim();
 if(name.length<2){alert("Enter shipping name.");return false;}
 if(!/^\d{6}$/.test(pin)){alert("Enter a valid 6-digit PIN.");return false;}
 return true;
}
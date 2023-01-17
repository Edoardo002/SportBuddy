function login() {
    var xhttp;
        document.getElementById("log").innerHTML = "";
      var mail = document.getElementById("mail-login").value;
      var psw = document.getElementById("psw-login").value;

      if ((mail=="") || (psw=="")) {
        alert("Inserire email e password prima di continuare.");
      } else {
     
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
        if (xhttp.readyState == 4 && xhttp.status == 200) {
        if (xhttp.responseText==1) {
           window.location.href = "pages/home.php";
        } else document.getElementById("log").innerHTML = "Mail o password non corretti.<br>";
            
        }
        }
        xhttp.open("POST", "php/login.php", false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("mail="+mail+"&psw="+psw);
}
}

function goRegister() {
  window.location.href = "pages/register.html";
}
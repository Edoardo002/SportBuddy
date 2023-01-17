function createAccount() {
    var xhttp;
      var nick = document.getElementById("name").value;
      var mail = document.getElementById("email").value;
      var psw = document.getElementById("password").value;

      if ((mail=="") || (psw=="")) {
        alert("Inserire email e password prima di continuare.");
      } else {
     
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
        if (xhttp.readyState == 4 && xhttp.status == 200) {
        if (xhttp.responseText==1) {
           window.location.href = "home.php";
        } document.getElementById("reg").innerHTML = "Mail già in uso, prova il log-in.<br>";
            
        }
        }
        xhttp.open("POST", "../php/register.php", false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("nick="+nick+"&mail="+mail+"&psw="+psw);
    }
}
function publishAd() {
    var xhttp;
      var name = document.getElementById("ad-name").value;
      var desc = document.getElementById("ad-desc").value;
      var price = document.getElementById("ad-price").value;
      var max_part = document.getElementById("ad-part").value;

      if ((name=="") || (desc=="") || (price=="") || (max_part=="")) {
        alert("Tutti i campi sono obbligatori! Compilali tutti prima di continuare.");
      } else {
     
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
        if (xhttp.readyState == 4 && xhttp.status == 200) {
        if (xhttp.responseText==1) {
           window.location.href = "myAds.php";
        } else alert("Errore durante il processo, riprova più tardi!");
            
        }
        }
        xhttp.open("POST", "../php/new_ad.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name="+name+"&desc="+desc+"&price="+price+"&max_part="+max_part);
    }
}
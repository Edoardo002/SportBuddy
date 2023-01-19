function publishEvent() {
    var xhttp;
      var date = document.getElementById("ev-date").value;
      var time = document.getElementById("ev-time").value;
      var name = document.getElementById("ev-name").value;
      var desc = document.getElementById("ev-desc").value;
      var place = document.getElementById("ev-place").value;
      var max_part = document.getElementById("ev-part").value;

      if ((date=="") || (time=="") || (name=="") || (desc=="") || (place=="") || (max_part=="")) {
        alert("Tutti i campi sono obbligatori! Compilali tutti prima di continuare.");
      } else {
     
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
        if (xhttp.readyState == 4 && xhttp.status == 200) {
        if (xhttp.responseText==1) {
           window.location.href = "myEvents.php";
        } else alert("Errore durante il processo, riprova più tardi!");
            
        }
        }
        xhttp.open("POST", "../php/new_event.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("date="+date+"&time="+time+"&name="+name+"&desc="+desc+"&place="+place+"&max_part="+max_part);
    }
}
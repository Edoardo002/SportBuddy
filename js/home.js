function descEvent(id, name, description) {
  $('#desc').modal('show');
  var label = document.getElementById('descLabel');
  var text = document.getElementById('descText');
  var part = document.getElementById('descPart');
  label.innerHTML = name;
  text.innerHTML = description;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
  if (xhttp.readyState == 4 && xhttp.status == 200) {
      var res = xhttp.responseText;
      part.innerHTML = res;
    }
  }
  xhttp.open("POST", "../php/getEventPart.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id);
}

function descAd(id, name, description) {
  $('#desc').modal('show');
  var label = document.getElementById('descLabel');
  var text = document.getElementById('descText');
  var part = document.getElementById('descPart');
  label.innerHTML = name;
  text.innerHTML = description;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
  if (xhttp.readyState == 4 && xhttp.status == 200) {
      var res = xhttp.responseText;
      part.innerHTML = res;
    }
  }
  xhttp.open("POST", "../php/getAdPart.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id);
}

function joinEvent(id, name) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
  if (xhttp.readyState == 4 && xhttp.status == 200) {
    if (xhttp.responseText==1) {
      alert('You have joined the Event '+name+'!\n Your activities will now be updated');
      window.location.href = "home.php";
    }
    }
  }
  xhttp.open("POST", "../php/joinEvent.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id+"&name="+name);
}

function joinAd(id, name) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
  if (xhttp.readyState == 4 && xhttp.status == 200) {
    if (xhttp.responseText==1) {
      alert('You have joined the Ad '+name+'!\n Your activities will now be updated');
      window.location.href = "home.php";
    }
    }
  }
  xhttp.open("POST", "../php/joinAd.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id+"&name="+name);
}

function forfeitEvent(id) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
  if (xhttp.readyState == 4 && xhttp.status == 200) {
    if (xhttp.responseText==1) {
      alert('You have forfeited this Event!\n Your activities will now be updated');
      window.location.href = "home.php";
    }
    }
  }
  xhttp.open("POST", "../php/forfeitEvent.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id+"&name="+name);
}

function forfeitAd(id) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
  if (xhttp.readyState == 4 && xhttp.status == 200) {
    if (xhttp.responseText==1) {
      alert('You have forfeited this Ad!\n Your activities will now be updated');
      window.location.href = "home.php";
    }
    }
  }
  xhttp.open("POST", "../php/forfeitAd.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id+"&name="+name);
}

function myEvents() {
  window.location.href = "myEvents.php";
}

function pastActivities() {
  window.location.href = "pastActivities.php";
}

function myAds() {
  window.location.href = "myAds.php";
}

function searchEvent() {
  window.location.href = "searchEvents.php";
}

function searchAd() {
  window.location.href = "searchAds.php";
}

function create() {
    $('#choose').modal('show');
}

function createEvents() {
  window.location.href = "event.html";
}

function createAds() {
  window.location.href = "ad.html";
}

window.onload = function() {
    
  };
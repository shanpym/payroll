
function digitalClock() {

    var currentTime = new Date();

    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12;
    

    if (minutes < 10) { 
      minutes = "0" + minutes;
    }
    if (seconds < 10) {
      seconds = "0" + seconds;
    }

    currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
    document.getElementById("time").value = currentTime;

  }

  window.onload = function() {
    setInterval(digitalClock, 1000);
  };


  
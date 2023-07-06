var x = document.getElementById("myAudio1");
var x2 = document.getElementById("myAudio2");

function showHint(str) {
if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
} else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
}
}

function playAudio() { 
x.play(); 
}

function onScanSuccess(qrCodeMessage) {
document.getElementById("result").value = qrCodeMessage;
showHint(qrCodeMessage);
playAudio();
}


function onScanError(errorMessage) {
// Manejar el error del escaneo
}

var html5QrcodeScanner = new Html5QrcodeScanner(
"reader", { fps: 10, qrbox: 250 }
);

html5QrcodeScanner.render(onScanSuccess, onScanError);


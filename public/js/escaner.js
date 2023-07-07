var x = document.getElementById("myAudio1");
var x2 = document.getElementById("myAudio2");

function onScanSuccess(qrCodeMessage) {
  document.getElementById("result").value = qrCodeMessage;
  playAudio();
}


var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });

html5QrcodeScanner.render(onScanSuccess, null);

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Demo</title>
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
</head>
<body>
    <h1>QR Code Scanner</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <canvas id="canvas" width="640" height="480"></canvas>

    <script src="{{ asset('js/qr-scanner.js') }}"></script>
</body>
</html>

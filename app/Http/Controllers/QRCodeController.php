<?php

namespace App\Http\Controllers;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QRCodeController extends Controller
{
    public function showQRCode()
    {
        $data = 'ABCDE12345'; 

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);

        $qrCode = $writer->writeString($data);

        return view('qrcode', ['qrCode' => $qrCode]);
    }
}

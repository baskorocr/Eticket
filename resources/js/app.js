import "./bootstrap";
import { Html5QrcodeScanner } from "html5-qrcode";
import axios from 'axios';

document.addEventListener("DOMContentLoaded", function () {
    let hasScanned = false;

    function onScanSuccess(decodedText, decodedResult) {
        if (hasScanned) return;
        hasScanned = true;

        console.log(`Code matched = ${decodedText}`, decodedResult);

        setTimeout(() => {
            window.location.href = `https://cgs.dharmap.com/kidp/verif/${decodedText}`;
        }, 2000); // delay 1 detik (1000 ms), bisa disesuaikan
    }

    function onScanFailure(error) {
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250,
    });

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
});


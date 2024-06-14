import "./bootstrap";
import { Html5QrcodeScanner } from "html5-qrcode";
import axios from 'axios';

document.addEventListener("DOMContentLoaded", function () {
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code matched = ${decodedText}`, decodedResult);
      
        const data = {
            id: decodedText
        };
        
         axios.post('/etiket/postScanPresensi', data)
            .then(function (response) {
                console.log('Server response:', response.data);
                alert('Scan data successfully submitted to the server!');
            })
            .catch(function (error) {
                console.error('Error submitting scan data:', error);
                alert('Failed to submit scan data to the server.');
            });
        // Handle the scanned code here, e.g., submit the data to the server
    }

    function onScanFailure(error) {
        // Handle scan failure, usually better to ignore and keep scanning
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250,
    });

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
});

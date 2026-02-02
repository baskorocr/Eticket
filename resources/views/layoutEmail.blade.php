<!DOCTYPE html>
<html>
<head>
    <title>Undangan Konvensi Improvement</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2>Semangat Pagi</h2>
    <p>Dengan hormat,</p>
    <p>
        Bapak/Ibu diundang untuk menghadiri <strong>Konvensi Improvement Dharma Polimetal XVIII</strong>.  
        Kehadiran Bapak/Ibu sangat kami harapkan sebagai bagian dari upaya untuk terus memperkuat komitmen perusahaan dalam melakukan improvement.
    </p>
    <p>
        Berikut adalah informasi Anda yang telah terdaftar:<br>
        <strong>Nama:</strong> {{ $registrasi->karyawan->namaKaryawan }}<br>
        <strong>NPK:</strong> {{ $registrasi->karyawan->NPK }}<br>
        <strong>Email:</strong> {{ $registrasi->email }}
    </p>
    <p>
        <strong>Detail Acara:</strong><br>
        <strong>Tanggal:</strong> 10 Mei 2025<br>
        <strong>Dresscode:</strong> Batik<br>
        <strong>Waktu:</strong> Jam 08:00 WIB<br>
        <strong>Tempat:</strong> Auditorium Dharma Polimetal Tbk
    </p>
    <p>
        Silakan tunjukkan barcode berikut saat hadir di lokasi acara:
    </p>
    <p>
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $registrasi->id }}" alt="QR Code">
    </p>
    <p>
        Terima kasih atas perhatiannya<br>
        Semangat Pagi, Salam Improvement.<br>
        <strong>Panitia Konvensi Improvement Dharma Polimetal XVIII</strong>
    </p>
</body>
</html>

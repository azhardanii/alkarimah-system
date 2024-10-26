<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santri Profile PDF Details</title>

    <style>
        @media print {
            body {
                width: 210mm; /* A4 Width */
                height: 297mm; /* A4 Height */
                margin: 0;
                padding: 0;
            }
            .page {
                width: 210mm;
                min-height: 297mm;
                margin: 0 auto;
                padding: 20mm;
                box-sizing: border-box;
                page-break-after: always;
            }
        }
    
        /* Non-responsive styles */
        body, html {
            width: 210mm; /* Fix the width to A4 */
            height: auto; /* Let height be automatic based on content */
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: white;
        }
    
        .no-print {
            display: none;
        }
    </style>
</head>
<body>
    <div class="page">
        <h1>Detail Santri</h1>
        <p>Nama: {{ $santri->nama_santri }}</p>
        <p>NIS: {{ $santri->nis }}</p>
        <p>Tanggal Lahir: {{ $santri->tanggal_lahir }}</p>
        <!-- Tambahkan data santri lainnya sesuai kebutuhan -->
    
        <div style="page-break-after: always;"></div> <!-- Untuk halaman baru jika banyak konten -->
    </div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
          
    <style>
        @font-face {
            font-family: 'Godawn';
            src: url('{{ asset("public/Godawn-Regular.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'The Great Kingdom';
            src: url('{{ asset("public/The-Great-Kingdom.otf") }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        @page {
            size: A4 portrait;
            margin: 0;
        }
        
        body {
            font-family: "sans-serif", Arial, Helvetica;
            margin: 0;
            padding: 0;
            width: 210mm;
            height: 297mm;
            color: #1a1a1a;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 210mm;
            height: 297mm;
            z-index: -1;
        }
        
        .certificate-container {
            width: 210mm;
            height: 297mm;
            position: relative;
        }
        
        .content-wrapper {
            position: absolute;
            top: 295px;
            width: 100%;
            text-align: center;
        }
        
        .certify-text {
            font-size: 18pt;
            color: #444;

        }
        
        .member-name {
            /* font-family: 'Godawn', sans-serif; */
            font-family: 'The Great Kingdom', sans-serif;
            font-size: 22pt;
            font-weight: bold;
            font-style: italic;
            margin: 15px 0;
            display: inline-block;
            padding: 0 15mm;
        }
        
        .member-type {
            font-size: 28pt;
            font-weight: bolder;
            margin: 5mm 0;
            color: #222;
        }
        
        .body-text {
            font-size: 15pt;
            line-height: 1.6;
        }

        .membership-label {
            font-size: 15pt;
            color: #666;
            margin-bottom: 2mm;
        }

        .membership-box {
            margin-top: 20px;
        }

        .membership-number {
            font-size: 28pt;
            font-weight: bold;
            color: #ff0000;
        }
        
        /* QR Code fixed to bottom right */
        .qr-section {
            position: absolute;
            bottom: 30mm;
            right: 30mm;
            text-align: center;
        }

        .qr-image {
            width: 32mm;
            height: 32mm;
        }

        .qr-text {
            font-size: 8pt;
            margin-top: 2mm;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    @php
        $image_path = public_path('images/certificate.jpg');
        $image_data = base64_encode(file_get_contents($image_path));
    @endphp
    
    <img src="data:image/jpeg;base64,{{ $image_data }}" class="background-image">

    <div class="certificate-container">
        
        <div class="content-wrapper">
            <div class="certify-text">
                This is to certify that
            </div>

            <div class="member-name">{{ $user->name }}</div>
            <div class="certify-text">
                has been accepted as
            </div>
            
            <div class="member-type">{{ $member_type }}</div>
            
            <div class="body-text">
                of <strong>Interior Designers Association of Bangladesh</strong><br>
                for the period from<br>
                <strong>{{ $start_date }}</strong> to 
                <strong>{{ $end_date }}</strong>
            </div>

            <div class="body-text">
                The holder of this certificate accepts the privilege and responsibility of<br>
                Certified Interior Designer by</span>
            </div>

            <div class="membership-box">
                <div class="membership-label">MEMBERSHIP NUMBER</div>
                <div class="membership-number">{{ $certificate_no }}</div>
            </div>
        </div>

        <div class="qr-section">
            <img src="data:image/png;base64,{{ $qrcode }}" class="qr-image" />
            <div class="qr-text">Scan to Verify</div>
        </div>

    </div>
</body>
</html>
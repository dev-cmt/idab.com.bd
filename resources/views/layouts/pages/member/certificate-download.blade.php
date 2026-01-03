<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }
        
        body {
            font-family: "serif"; /* PDF engines prefer generic serif for Times New Roman */
            margin: 0;
            padding: 0;
            width: 210mm;
            height: 297mm;
        }

        /* The fix for the background image */
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
        
        
        .inner-border {
            position: absolute;
            top: 25mm;
            left: 25mm;
            right: 25mm;
            bottom: 25mm;
            text-align: center;
            /* border: 2px solid #000000; */
        }
        
        /* Content layout */
        .content {
            margin-top: 40mm;
        }
        
        .certify-text {
            font-size: 18pt;
            font-style: italic;
            margin-bottom: 10mm;
        }
        
        .member-name {
            font-size: 32pt;
            font-weight: bold;
            color: #1a1a1a;
            margin: 5mm 0;
            border-bottom: 2px solid #333;
            display: inline-block;
            padding: 0 20px;
        }
        
        .member-type {
            font-size: 22pt;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 15mm 0;
            color: #8b0000; /* Deep red for emphasis */
        }
        
        .body-text {
            font-size: 14pt;
            line-height: 1.8;
            padding: 0 20mm;
        }

        .membership-section {
            margin-top: 20mm;
        }

        .membership-number {
            font-size: 20pt;
            font-weight: bold;
            margin-top: 5mm;
        }
        
        /* Signature Section */
        .footer-section {
            position: absolute;
            bottom: 40mm;
            width: 100%;
        }

        .signature-box {
            width: 200px;
            margin: 0 auto;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .signature-name {
            font-size: 14pt;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <img src="{{ asset('public/images/certificate.jpg') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">

    <div class="certificate-container">
        
        <div class="inner-border">
            <div class="content">
                <div class="certify-text">This is to certify that</div>
                
                <div class="member-name">{{ $user->name }}</div>
                
                <div class="member-type">PROFESSIONAL MEMBER</div>
                
                <div class="body-text">
                    of <strong>Interior Designers Association of Bangladesh</strong><br>
                    for the period from<br>
                    <strong>January 01, {{ date('Y') }}</strong> to 
                    <strong>December 31, {{ date('Y') }}</strong>
                </div>

                <div class="body-text" style="margin-top: 10mm;">
                    The holder of this certificate accepts the privilege and responsibility of<br>
                    <strong>Certified Interior Designer</strong>
                </div>

                <div class="membership-section">
                    <div style="font-size: 10pt; letter-spacing: 1px;">MEMBERSHIP NUMBER</div>
                    <div class="membership-number">{{ $certificate_no }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
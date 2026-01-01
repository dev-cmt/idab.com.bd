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
            font-family: "Times New Roman", serif;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Outer gray border */
        .outer-border {
            width: 210mm;
            height: 297mm;
            border: 12px solid #eeeeee;
            padding: 12mm;
        }

        /* Inner black border */
        .inner-border {
            width: 100%;
            height: 100%;
            border: 2px solid #000000;
            padding: 10mm;
        }

        /* Logo */
        .logo {
            font-size: 46pt;
            font-weight: bold;
            letter-spacing: 4pt;
        }

        .logo-red {
            color: #b00000;
        }

        .association {
            font-size: 12pt;
            letter-spacing: 4pt;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
        }

        .certify-text {
            font-size: 16pt;
        }

        .member-name {
            font-size: 28pt;
            font-weight: bold;
            text-decoration: underline;
        }

        .member-type {
            font-size: 20pt;
            font-weight: bold;
            letter-spacing: 1pt;
        }

        .text {
            font-size: 13pt;
            line-height: 1.6;
        }

        .membership-label {
            font-size: 10pt;
            letter-spacing: 1px;
            font-weight: bold;
            color: #555;
        }

        .membership-number {
            font-size: 22pt;
            font-weight: bold;
            color: #8b0000;
        }

        .signature-name {
            font-size: 14pt;
            font-weight: bold;
        }

        .signature-title {
            font-size: 11pt;
            color: #555;
        }

        .footer {
            font-size: 9pt;
            color: #555;
        }

        .spacer {
            height: 20px;
        }
    </style>
</head>

<body>

<table class="outer-border">
    <tr>
        <td>
            <table class="inner-border">
                <tr>
                    <td>

                        <table>

                            <!-- LOGO -->
                            <tr>
                                <td align="center">
                                    <div class="logo">
                                        ID<span class="logo-red">AB</span>
                                    </div>
                                    <div class="association">
                                        Interior Designers Association of Bangladesh
                                    </div>
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- CERTIFY -->
                            <tr>
                                <td align="center" class="certify-text">
                                    This is to certify that
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- NAME -->
                            <tr>
                                <td align="center">
                                    <div class="member-name">{{ $user->name }}</div>
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- MEMBER TYPE -->
                            <tr>
                                <td align="center" class="member-type">
                                    PROFESSIONAL MEMBER
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- BODY TEXT -->
                            <tr>
                                <td align="center" class="text">
                                    of Interior Designers Association of Bangladesh<br><br>
                                    for the period from<br>
                                    <strong>January 01 {{ date('Y') }}</strong> to
                                    <strong>December 31 {{ date('Y') }}</strong>
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- DESCRIPTION -->
                            <tr>
                                <td align="center" class="text">
                                    The holder of this certificate accepts the privilege and responsibility of
                                    <strong>Certified Interior Designer</strong> by<br>
                                    <strong>Interior Designers Association of Bangladesh</strong>
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- MEMBERSHIP -->
                            <tr>
                                <td align="center">
                                    <div class="membership-label">MEMBERSHIP NUMBER</div>
                                    <div class="membership-number">{{ $certificate_no }}</div>
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- SIGNATURE -->
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td width="50%" valign="bottom">
                                                <div class="signature-name">
                                                    Syed Quamrul Ahsan
                                                </div>
                                                <div class="signature-title">
                                                    President
                                                </div>
                                            </td>

                                            <td width="50%" align="right" valign="bottom">
                                                <strong>
                                                    INTERIOR DESIGNERS<br>
                                                    ASSOCIATION OF BANGLADESH
                                                </strong><br>
                                                <span class="footer">
                                                    www.idab.com.bd
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr><td class="spacer"></td></tr>

                            <!-- FOOTER -->
                            <tr>
                                <td align="center" class="footer">
                                    This certificate remains the property of IDAB<br>
                                    Visit to verify this membership<br>
                                    www.idab.com.bd
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>

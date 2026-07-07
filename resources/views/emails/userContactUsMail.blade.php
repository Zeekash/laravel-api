<!DOCTYPE html>
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title>New Contact Request</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet" type="text/css" />
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Nunito', Arial, 'Helvetica Neue', Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            -webkit-text-size-adjust: none;
            text-size-adjust: none;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #123269;
            padding: 30px 20px;
            text-align: center;
        }

        .header img {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .header h1 {
            color: #ffffff;
            font-size: 24px;
            margin: 20px 0 0 0;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .content {
            padding: 40px 30px;
            color: #333333;
        }

        .content h2 {
            font-size: 20px;
            color: #123269;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 0 0 20px 0;
            color: #555555;
        }

        .details-box {
            background-color: #f9fbff;
            border-left: 4px solid #eb0505;
            padding: 20px;
            border-radius: 0 4px 4px 0;
            margin-bottom: 30px;
        }

        .details-table {
            width: 100%;
        }

        .details-table td {
            padding: 8px 0;
            font-size: 16px;
            line-height: 1.5;
            vertical-align: top;
        }

        .details-label {
            font-weight: 700;
            color: #101112;
            width: 30%;
        }

        .details-value {
            color: #123269;
            width: 70%;
            font-weight: 700;
        }

        .message-box {
            background-color: #ffffff;
            border: 1px solid #e1e5eb;
            padding: 15px;
            border-radius: 4px;
            margin-top: 5px;
            color: #123269;
            font-weight: 400;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        .footer {
            background-color: #f4f6f9;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #888888;
        }

        @media (max-width: 620px) {
            .content {
                padding: 30px 20px;
            }

            .details-label,
            .details-value {
                display: block;
                width: 100%;
            }

            .details-label {
                padding-bottom: 2px;
            }

            .details-value {
                padding-top: 0;
                padding-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #f4f6f9; padding: 40px 20px;">
        <tbody>
            <tr>
                <td align="center">
                    <!-- Main Container -->
                    <table border="0" cellpadding="0" cellspacing="0" class="container">
                        <tbody>
                            <!-- Header Section -->
                            <tr>
                                <td class="header">
                                    <img src="{{ asset('assets/img/logo.png') }}"
                                        alt="My Moving Journey Logo" />
                                    <h1>New Contact Inquiry</h1>
                                </td>
                            </tr>

                            <!-- Content Section -->
                            <tr>
                                <td class="content">
                                    <h2>Hello,</h2>
                                    <p>A user has recently submitted a contact form on your website. Here are the
                                        details of their inquiry:</p>

                                    <!-- Details Highlight Box -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td class="details-box">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    class="details-table">
                                                    <tr>
                                                        <td class="details-label">Name:</td>
                                                        <td class="details-value">{{ $user_contact_us->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="details-label">Email:</td>
                                                        <td class="details-value">
                                                            <a href="mailto:{{ $user_contact_us->email }}"
                                                                style="color: #123269; text-decoration: none;">
                                                                {{ $user_contact_us->email }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="details-label">Phone No:</td>
                                                        <td class="details-value">
                                                            <a href="tel:{{ $user_contact_us->phone_no }}"
                                                                style="color: #123269; text-decoration: none;">
                                                                {{ $user_contact_us->phone_no }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="details-label">Subject:</td>
                                                        <td class="details-value">{{ $user_contact_us->subject }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="details-label">Message:</td>
                                                        <td class="details-value">{{ $user_contact_us->message }}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>

                            <!-- Footer Section -->
                            <tr>
                                <td class="footer">
                                    <p style="margin: 0;">This is an automated notification from your website.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Main Container -->
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

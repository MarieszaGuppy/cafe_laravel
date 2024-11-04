<!DOCTYPE html>
<html>

<head>
    <title>Send Email</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- StyleSheets  -->

    @vite(['resources/css/style-email.css'])
    @vite(['resources/css/dashlite.css'])
    @vite(['resources/css/theme.css'])
</head>

<body>
    <table class="email-wraper">
        <tr>
            <td class="py-5">
                <table class="email-header">
                    <tbody>
                        <tr>
                            <td class="text-center pb-4">
                                <a href="#"><img class="email-logo" src="https://imgur.com/a/jdYccXp.png"
                                        alt="logo"></a>
                                <p class="email-title">Kafe Santai dan Penuh Keceriaan</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-body text-center">
                    <tbody>
                        <tr>
                            <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-3">
                                <h2 class="email-heading">Reset Password</h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pb-2">
                                <p>Hallo, Mariesza!</p>
                                <p>Silahkan klik link di bawah ini untuk melakukan reset password.</p>
                                <a href="{{ $mailData['reset_link'] }}" class="email-btn">RESET PASSWORD</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pt-4 pb-3 pb-sm-5">
                                <p>JIka anda tidak melakukan permintaan untuk mereset password, tolong kontak kami atau
                                    abaikan saja email ini.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-footer">
                    <tbody>
                        <tr>
                            <td class="text-center pt-4">
                                {{-- <p class="email-copyright-text">Copyright © 2020 DashLite. All rights reserved. <br>
                                    Template Made By <a
                                        href="https://themeforest.net/user/softnio/portfolio">Softnio</a>.</p>
                                <ul class="email-social">
                                    <li><a href="#"><img src="./images/socials/facebook.png" alt=""></a>
                                    </li>
                                    <li><a href="#"><img src="./images/socials/twitter.png" alt=""></a>
                                    </li>
                                    <li><a href="#"><img src="./images/socials/youtube.png" alt=""></a>
                                    </li>
                                    <li><a href="#"><img src="./images/socials/medium.png" alt=""></a>
                                    </li>
                                </ul> --}}
                                <p class="fs-12px pt-4">Email ini dikirim kepada Anda sebagai pelanggan terverifikasi <a
                                        href="#">TeaJam Cafe</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>



    @vite(['resources/js/bundle.js'])
    @vite(['resources/js/scripts.js'])
    @vite(['resources/js/charts/chart-ecommerce.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

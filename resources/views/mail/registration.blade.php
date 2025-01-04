<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $subject }}</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #e9e8e8;
        }

        div.container {
            display: flex;
            justify-content: center;
            min-height: auto;
        }

        div.contentBox {
            height: auto;
            background: white;
        }

        .header {
            background-color: rgb(10, 141, 39);
            color: white;
            padding: 0.1rem 1rem;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .content {
            padding: 0.2rem 1rem;
        }

        p.name {
            font-size: 1.2rem;
        }

        ul.credentials {
            list-style-type: none;
            background-color: rgb(247, 247, 119);
            padding: 1.2rem;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="contentBox">
            <div class="header">
                <p>WELCOME TO EDORB</p>
            </div>
            <div class="content">
                <p class="name">Hello, <span
                        style="color: rgb(4, 116, 13); font-weight: bold;">{{ $user->name }}</span></p>
                <p>
                    Thank you for registering with
                    <a href="edorb.in" target="_blank">edorb.in</a>! We're excited to have you on board.
                </p>
                <p style="color: rgb(136, 4, 4); font-weight: bold; text-align:justify;">
                    A confirmation email will be sent to your registered email address once your profile is activated or
                    Please click the link below to verify and activate your profile by yourself:
                </p>
                <button style="background: rgb(3, 90, 3); padding: .2rem 1rem;">
                    <a href="{{ $url }}" target="_blank" style="color: white; text-decoration: none;">Click to
                        activate your account</a>
                </button>
                <p style="text-align: justify;">If you did not create an account, no further action is required.</p>

                <p>Your login credentials are as follows:</p>
                <ul class="credentials">
                    <li style="padding: .2rem 0;">Login ID: <span style="font-weight: bold;">{{ $userid }}</span>
                    </li>
                    <li style="padding: .2rem 0;">Password: <span style="font-weight: bold;">{{ $password }}</span>
                    </li>
                </ul>
                <p style="text-align:justify;">
                    For your security, please keep your login credentials confidential and do not share them with
                    anyone. If you have any questions or concerns, please contact us at support@edorb.in. We look
                    forward to serving you and providing you with an outstanding experience.
                </p>
                <div class="footer" style="margin-top: 1rem;">
                    <p style="color: gray;">Team EDORB</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

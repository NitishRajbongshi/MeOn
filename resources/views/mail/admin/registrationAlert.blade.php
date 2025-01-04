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
                <p>New Registration Alert</p>
            </div>
            <div class="content">
                <p class="name">Hello, <span style="color: rgb(4, 116, 13); font-weight: bold;">Administrator</span>
                </p>

                <p style="color: rgb(136, 4, 4); font-weight: bold; text-align:justify;">
                    Congratulations! You have a new registration notification. Please log into your account to activate
                    the student from your side.
                </p>

                <p>The User Information is:</p>
                <ul class="credentials">
                    <li style="padding: .2rem 0;">Name: <span style="font-weight: bold;">{{ $user->name }}</span></li>
                    <li style="padding: .2rem 0;">Email: <span style="font-weight: bold;">{{ $user->email }}</span>
                    </li>
                </ul>

                <div class="footer" style="margin-top: 1rem;">
                    <p style="color: gray;">Team EDORB</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{Lang::T('Login')} - {$_c['CompanyName']}</title>
    <link rel="shortcut icon" href="ui/ui/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="ui/ui/styles/bootstrap.min.css">
    <link rel="stylesheet" href="ui/ui/styles/modern-AdminLTE.min.css">
    <style>
        /* Make body take full height and ensure content fills space */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Background gradient */
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }

        .login-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        .login-logo {
            text-align: center;
            font-size: 32px;
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .login-box-body {
            padding: 0;
        }

        .login-box-msg {
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
            color: #555;
        }

        .form-group input {
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding-left: 40px;
        }

        .form-group input:focus {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-group .form-control-feedback {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #555;
        }

        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
            border-radius: 25px;
            padding: 12px 20px;
            width: 100%;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #1c5bb5;
            border-color: #1c5bb5;
        }

        /* Sticky footer at the bottom */
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #aaa;
            margin-top: auto;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            {$_c['CompanyName']}
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{Lang::T('Enter Admin Area')}</p>
            {if isset($notify)}
                <div class="alert alert-danger">
                    {$notify}
                </div>
            {/if}
            <form action="{$_url}admin/post" method="post">
                <input type="hidden" name="csrf_token" value="{$csrf_token}">
                <div class="form-group has-feedback">
                    <input type="text" required class="form-control" name="username" placeholder="{Lang::T('Username')}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" required class="form-control" name="password" placeholder="{Lang::T('Password')}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">{Lang::T('Login')}</button>
            </form>
        </div>
    </div>
    <div class="footer">
        &copy; 2025 Unganisha Networks. All Rights Reserved.
    </div>
</body>

</html>

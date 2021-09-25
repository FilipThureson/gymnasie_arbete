<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        body{
            background-color: #1a202c;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }
        .loginDiv{
            width: 40%;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            background-color: #323d54;
            align-items: center;
            justify-content: center;
            color: #e3e3e3;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }
        #google_link{
            width: 40%;
        }
        #google_img{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="loginDiv">
        <img id="logo" src="logo.png" alt="logo">
        <p>login to access our service</p>
        <a id="google_link" href="/auth/redirect"><img id="google_img"src="btn_google_signin_light_normal_web@2x.png"></a>
    </div>
</body>
</html>
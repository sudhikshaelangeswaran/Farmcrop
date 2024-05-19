<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(to bottom, #ffffff, #ffffff, #273a18);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0 20px;
        }
        header {
            border: 2px solid #45a049;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        .logo {
            max-width: 250px;
            margin: 0 auto;
            transition: transform 0.3s;
        }
        .logo:hover {
            transform: scale(5.1);
        }
        .header h1 {
            font-size: 36px;
            font-weight: bold;
            color: #45a049;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        .framcrop-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .framcrop-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
        }
        .framcrop-form input[type="text"],
        .framcrop-form input[type="email"],
        .framcrop-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 19px;
        }
        .framcrop-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #F7DCB9;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
        .framcrop-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<img src="https://thumbs.dreamstime.com/b/spikelet-grain-crop-wheat-rye-rice-spikelet-grain-crop-wheat-rye-rice-vector-image-isolated-white-background-171488804.jpg" alt="FarmCrop Logo" class="logo">
<h1>FARMCROP</h1>
<div class="container">
    <form class="framcrop-form" method="post" action="{{route('authenticate')}}">
        @csrf

        <div>
            <label for="email">Email address</label>
            <input type="email" id="email" name="email">
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div>
            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="password">
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <input type="submit" value="SIGN UP">

    </form>
</div>
</body>
</html>

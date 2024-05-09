<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('layoutsAdmin.head')
    <title>Forgot password</title>
    <style>
        /* Add the provided CSS styles here */

        /* Body */
        body {
            background: linear-gradient(to right, #00636a, #282a39);
            overflow: auto;
        }

        /* Form Box */
        .form-box {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Form Value */
        .form-value {
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 1rem;
            height: 70vh;
            width: 70vw;
        }

        /* Form Login */
        .form-login {
            background-color: white;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            height: 70vh;
            width: 25vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        /* Heading 2 */
        .form-login h2 {
            margin-top: 0%;
            font-size: 60px; /* Adjust the font size as desired */
            padding: 0;
            color: #282a39;
            text-align: center;
        }

        /* Input Box */
        .inputbox {
            margin-top: 40px;
            position: relative;
            justify-content: center;
            padding: 15px;
            text-align: center;
        }

        /* Input Field */
        .inputbox input {
            margin-left: 20px;
            width: 90%;
            position: relative;
            border: none;
            outline: none;
            margin-bottom: 10px;
            background: transparent;
            border-bottom: 2px solid #282a39;
            color: #282a39;
        }

        /* Input Label */
        .inputbox label {
            color: #282a39;
            position: absolute;
            left: 40px;
            pointer-events: none;
            transition: .5s;
            font-size: 16px;
        }

        /* Input Label Focus */
        .form-login .inputbox input:focus ~ label,
        .form-login .inputbox input:valid ~ label {
            top: -5px;
            left: 40px;
            color: #282a39;
            font-size: 12px;
        }

        /* Form Image */
        .form-image {
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
            background-color: #88ccd1;
            height: 70vh;
            width: 45vw;
        }

        /* Form Image - Image */
        .form-image img {
            background-color: none;
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
            height: 70vh;
            width: 45vw;
            mix-blend-mode: multiply;
        }

        /* Form Login Button */
        .form-login button {
            margin-left: 205px;
            margin-top: 60px;
            background: linear-gradient(#00636a, #5ae9ff);
            color: white;
            border: 2px solid white;
            border-radius: 10rem;
            width: 140px; /* Adjust width as desired */
            height: 40px; /* Adjust height as desired */
            font-size: 17px; /* Adjust font size as desired */
        }

        /* Form Login Button - Hover */
        .form-login button:hover {
            font-size: larger;
            cursor: pointer;
        }

        /* Container */
        .container {
            margin-top: 30px;
        }

        /* Container Link */
        .container a {
            color: #282a39;
            text-decoration: none;
            margin-left: 60px;
        }

        /* Container Input */
        .container input {
            margin-left: 15px;
            cursor: pointer;
        }

        /* Container Input - Hover */
        .container input:hover {
            color: #5ae9ff;
        }

        /* Container Label */
        .container label {
            cursor: pointer;
        }
        h2 span {
            display: block;
            padding: 5%;
            justify-content: center;
        }

        /* Media Query for Smaller Screens */
        @media (max-width: 1000px) {
            body {
                overflow: auto;
            }

            .form-value {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .form-image img {
                height: 100%;
                width: 100%;
                border-top-right-radius: 1rem;
                border-bottom-left-radius: 0%;
            }

            .form-image {
                height: 50%;
                width: 100%;
                border-top-right-radius: 1rem;
                border-bottom-left-radius: 0%;
            }

            .form-login {
                height: 70%;
                width: 100%;
                border-top-right-radius: 0%;
                border-bottom-left-radius: 1rem;
            }

            .inputbox {
                display: flex;
                justify-content: center;
                padding: 0;
            }

            .form-login button,
            .forget {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 10px;
                margin-left: 36%;
                margin-bottom: 10%;
            }

            .form-login h2 {
                font-size: 60px;
                text-align: center;
                margin-top: 0;
            }
          
            .form-heading {
                font-size: 60px;
                text-align: center;
                margin-top: 0;
            }

            .container a {
                margin-left: 42%;
            }

            .container {
                margin-top: 4%;
                margin-bottom: 15px;
            }

            .inputbox input {
                margin-left: 0%;
            }

            .inputbox label {
                /* Styles specific to smaller screens */
            }

            .form-login .inputbox input:focus ~ label,
            .form-login .inputbox input:valid ~ label {
                top: -10px;
                left: 26px;
                color: #282a39;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    @foreach($errors->all() as $error)
    <li style="font-size: 20px; color: rgb(255, 0, 0);">{{$error}}</li>
    @endforeach
    <div class="form-box">
        <div class="form-value">
            <div class="form-image">
                <img src="https://th.bing.com/th/id/R.dafa995155fad6fabd86213799884d70?rik=MPWqJqRiyypAeg&riu=http%3a%2f%2fi17.servimg.com%2fu%2ff17%2f11%2f70%2f06%2f47%2fensias10.jpg&ehk=fhoy82e94jI15%2bavETXZ5xYpD6UvYjSDlWO9pUqVrcQ%3d&risl=&pid=ImgRaw&r=0" alt="image de l'ensias">
            </div>
            <div class="form-login">
                <div class="form-heading">
                    <h2>
                        <span>Forgot</span>
                        <span>Password</span>
                    </h2>
                </div>
                <form action="{{route('forgot.password.link')}}" method="post">
                    @csrf
                    <div class="inputbox">
                        <input type="email" name="email" required>
                        <label>Email:</label>
                    </div>
                    <button type="submit">Send Link</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

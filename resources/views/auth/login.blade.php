<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">      
    
    @include('layoutsAdmin.head')
    <title>Login</title>
</head>
<style>
    
    body{
        background: linear-gradient(to right,#00636a, #282a39);
        overflow: auto;
    }
    .form-box{
        display: flex;
        align-items: center;
    	justify-content: center;
        height: 100vh;
    }
    .form-value{
        display: flex;
        align-items: center;
    	justify-content: center;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 1rem;
        height: 70vh;
        width: 70vw;
    }
    .form-login{

        background-color: white;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
        height: 70vh;
        width: 25vw;
    }
    h2{
        margin-top: 30px;
        font-size: 70px;
        padding: 0;
        color: #282a39;
        text-align: center;
    }
    .inputbox{
        margin-top: 40px;
        position: relative;
        justify-content: center;
        padding: 15px;
        text-align: center;
    }
    .inputbox input{
        margin-left: 20px;
        width: 90%;
        position: relative;
        border: none;
        outline: none;
        margin-bottom: 10px;
        background: transparent;
        border-bottom: 2px solid #282a39;
        color:#282a39;
    }
    .inputbox label{
        color: #282a39;
        position: absolute;
        left: 40px;
        pointer-events: none;
        transition: .5s;
        font-size: 16px;
    }
    .form-login .inputbox input:focus ~ label,
    .form-login .inputbox input:valid ~ label
    {
        top: -5px;
        left: 40px;
        color: #282a39;
        font-size: 12px;
    }    
    .form-image{
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        background-color: #88ccd1 ;
        height: 70vh;
        width: 45vw;
    }
    .form-image img{
        background-color: none;
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        height: 70vh;
        width: 45vw;
        mix-blend-mode: multiply;
    }
    .form-login button{
        margin-left: 205px;
        margin-top: 60px;
        background: linear-gradient(#00636a, #5ae9ff);
        color:white;
        border: 2px solid white;
        border-radius: 10rem;
        width: 140px; /* Adjust width as desired */
        height: 40px; /* Adjust height as desired */
        font-size: 17px; /* Adjust font size as desired */
    }
    .form-login button:hover{
        font-size: larger;
}
    .container{
        margin-top: 30px;
    }
    .container a {
        color: #282a39;
        text-decoration: none;
        margin-left: 60px;
        }
    .container input{
        margin-left: 15px;
        cursor: pointer;
    }
    .container input:hover{
        color: #5ae9ff;
    }
    .container label{
        cursor: pointer;
    }
    
    /* Media query for smaller screens */
    @media (max-width: 1000px) {
       
        
      body{
        overflow: auto;
      }
      .form-value {
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      .form-image img{
        height: 100%;
        width: 100%;
        border-top-right-radius: 1rem;
        border-bottom-left-radius: 0%;
      }
      .form-image{
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

      h2{
        margin-top: 0%;
      }
      .container a {
        margin-left: 42%;
        }
      .container {
        margin-top: 4%;
        margin-bottom: 15px;
      }
      .inputbox input{
        margin-left: 0%;
      }
      .inputbox label{

      }
        .form-login .inputbox input:focus ~ label,
        .form-login .inputbox input:valid ~ label
        {
            top: -10px;
            left: 26px;
            color: #282a39;
            font-size: 12px;
        
        }
}

</style>
<body>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <div class="wrapper">

        <!--=================================
preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
preloader -->  
        <div class="form-box">
            <div class="form-value">
                
                    <div class="form-image">
                        <img src="https://th.bing.com/th/id/R.dafa995155fad6fabd86213799884d70?rik=MPWqJqRiyypAeg&riu=http%3a%2f%2fi17.servimg.com%2fu%2ff17%2f11%2f70%2f06%2f47%2fensias10.jpg&ehk=fhoy82e94jI15%2bavETXZ5xYpD6UvYjSDlWO9pUqVrcQ%3d&risl=&pid=ImgRaw&r=0" alt="image de l'ensias">
                    </div>

                    <div class="form-login">
                        <h2>Login</h2>
                        <form action="{{ route('authenticate')}}" method="post">
                        @csrf

                        <div class="inputbox">
                            <input type="email" name="email" required>
                            <label>E-mail</label>
                        </div>    

                        <div class="inputbox">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        
                        <div class="container">
                            <a href="{{route('forgot.password.form')}}" style="margin-left: 58%;">forget password?</a><br>
                        </div>
                        <button type="submit">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layoutsAdmin.footer-scripts')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

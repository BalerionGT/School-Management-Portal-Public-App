

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Professeurs</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        @include('layoutsProf.head')
</head>
  <title>My Profile Page</title>
  <style>
        body {

            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 75%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 0;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Add more styles as needed */
    </style>
</head>
    <body>
        <div class="wrapper">

            <!--=================================
            preloader -->

            <div id="pre-loader">
                <img src="/assets/images/pre-loader/loader-01.svg" alt="">
            </div>

            <!--=================================
            preloader -->

            @include('layoutsProf.main-header')

            @include('layoutsProf.main-sidebar')

            <!--=================================
            Main content -->
            
            <div class="container" style="margin-left: 17%;">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input fields for name, email, phone, etc. -->
                    <label> Nom</label><br>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required><br><br>
                    <label> Email</label><br>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required><br><br>
                    <label> Phone</label><br>
                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" required><br><br>

                    <!-- Add other input fields for additional information -->

                    <button type="submit">Enregistrer les modifications</button>
                </form>
            </div>
        
                


            <!-- main-content -->
            <!--=================================
            footer -->
            @include('layoutsProf.footer')
        </div>
        <!--=================================
        footer -->
        @include('layoutsProf.footer-scripts')
    </body>
</html>

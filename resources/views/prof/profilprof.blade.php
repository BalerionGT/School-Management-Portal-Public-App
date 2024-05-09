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
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
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

        .frame {
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .frame h2 {
            color: #666;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .frame p {
            color: #777;
            margin: 5px 0;
        }

        .frame ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .frame li {
            color: #777;
            margin-bottom: 5px;
        }
    </style>
    @include('layoutsProf.head')
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
                <h1>User Profile</h1>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                <div class="frame">
                    <h2>Name: {{ auth()->user()->name}} </h2>
                </div>
                <div class="frame">
                    <p>Email: {{ auth()->user()->email}} </p>
                </div>
                <div class="frame">
                    <p>Phone Number: {{ auth()->user()->phone}}</p>
                </div>
                <h3>Diplomas:</h3>
                <input type="text" class="frame" placeholder="Diplomas">

                    <ul>

                    </ul>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                
                <!-- Add more frames for additional information -->
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



<!DOCTYPE html>
<html>
<head>
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
    @include('layoutsChef.head')
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

            @include('layoutsChef.main-header')

            @include('layoutsChef.main-sidebar')

            <!--=================================
            Main content -->
            
            <div class="container" style="margin-left: 17%;">
            <h1>User Profile</h1>
                <a href="{{ route('chef.edit') }}" class="btn btn-primary">Edit Profile</a><br>
                <label>Nom :</label>
                <div class="frame">
                    <h3>{{ auth()->user()->name}} </h3>
                </div>
                <label>E-mail :</label>
                <div class="frame">
                    <h3>{{ auth()->user()->email}} </h3>
                </div>
                <label>Phone:</label>
                <div class="frame">
                    <h3>{{ auth()->user()->phone}}</h3>
                </div>

                
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
            @include('layoutsChef.footer')
        </div>
        <!--=================================
        footer -->
        @include('layoutsChef.footer-scripts')
    </body>
</html>



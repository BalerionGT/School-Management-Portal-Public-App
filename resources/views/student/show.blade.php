<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @include('layoutsAdmin.head')
</head>
<body>
    <div class="wrapper">
    
        <!--=================================
        preloader -->
    
        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>
    
        <!--=================================
        preloader -->
    
        @include('layoutsAdmin.main-header')
    
        @include('layoutsAdmin.main-sidebar')
    
        <!--=================================
        Main content -->

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <h1 style="display: flex; justify-content: center; margin-top: 20px;">Les étudiants de {{$year}} année fillière {{$fillièreName}}</h1>

        <table style="margin: 0 auto; width: 40%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc; padding: 8px;">Name</th>
                    <th style="border: 1px solid #ccc; padding: 8px;">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">{{ $student->nom }}</td>
                        <td style="border: 1px solid #ccc; padding: 8px;">{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- main-content -->
    
        <!--=================================
        footer -->
        @include('layoutsAdmin.footer')
    </div>
    
    <!--=================================
    footer -->
    @include('layoutsAdmin.footer-scripts')
</body>
</html>

<!-- CONTENU D'ADMIN-->
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
        <!-- main-content -->
        <div class="content-wrapper">
            <table class="crud">
                <thead>
                    <tr>
                        <th>prénom</th>
                        <th>nom</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profs as $prof)
                    <tr>
                        <td>{{$prof->prenom}}</td>
                        <td>{{$prof->nom}}</td>
                        <td>{{$prof->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           <!--=================================
 wrapper -->

            <!--=================================
 footer -->

 @include('layoutsProf.footer')
        </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layoutsProf.footer-scripts')

</body>

</html> 
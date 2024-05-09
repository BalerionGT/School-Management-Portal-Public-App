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
    @include('layoutsAdmin.head')
    <style>
        .image-container {
        display: flex;
        flex-direction: column;
        width: 80%;
        
        margin-left: 17%;
        }
        
        .image-container img {
        margin-bottom: 10px;
        }
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

        @include('layoutsAdmin.main-header')

        @include('layoutsAdmin.main-sidebar')

        <!--=================================-->

           
        <div class="image-container">
            <img src="http://ensias.um5.ac.ma/sites/ensias.um5.ac.ma/files/Fiche%20SSE_compressed_page-0001.jpg" alt="Image 1">
            <img src="http://ensias.um5.ac.ma/sites/ensias.um5.ac.ma/files/SSE_2.jpg" alt="Image 2">
        </div>
            

            <!--=================================
 footer -->

            @include('layoutsAdmin.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layoutsAdmin.footer-scripts')

</body>

</html> 

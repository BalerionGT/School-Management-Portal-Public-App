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
    @include('layoutsEleve.head')
</head>
<style>
    .crud{
        border-collapse: collapse; /* Fusionner les bordures de cellules */
        border: 1px solid #ccc;
    }
    .crud th,
    .crud td {
    border: 1px solid #ccc; /* Définir la bordure des cellules */
    padding: 8px; /* Ajouter un espacement interne aux cellules */
    }
</style>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="/assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layoutsEleve.main-header')

        @include('layoutsEleve.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <table class="search">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>prénom</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->nom}}</td>
                        <td>{{$student->prénom}}</td>
                        <td>{{$student->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           <!--=================================
 wrapper -->

            <!--=================================
 footer -->

 @include('layoutsEleve.footer')
        </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layoutsEleve.footer-scripts')

</body>

</html> 
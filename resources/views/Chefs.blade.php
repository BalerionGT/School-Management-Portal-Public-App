<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @include('layoutsAdmin.head')      
    <title>profs</title>
</head>
<style>
    body{
        overflow: auto;
    }
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
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
    preloader -->

    @include('layoutsAdmin.main-header')

    @include('layoutsAdmin.main-sidebar')

    <!--=================================
    Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <h1>Liste des Chefs de fillière</h1>
        <div>
            <table class="crud">
                <thead>
                    <tr>
                        <th>prénom</th>
                        <th>nom</th>
                        <th>email</th>
                        <th>fillière</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liste_chefs as $chef)
                    <tr>
                        <td>{{$chef->prénom}}</td>
                        <td>{{$chef->nom}}</td>
                        <td>{{$chef->email}}</td>
                        <td>{{$chef->fillière}}</td>
                        <td>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet étudiant?')){document.getElementById('form-{{$chef->id}}').submit()}" >Supprimer</a>
                            <form id="form-{{$chef->id}}" action="{{route('chef.supprimer', ['chef'=>$chef->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--=================================
    footer -->
    @include('layoutsAdmin.footer')
    </div><!-- main content wrapper end-->
    <!--=================================
    footer -->
    @include('layoutsAdmin.footer-scripts')
    {{ $liste_chefs->links() }}
    </body>
    </html>
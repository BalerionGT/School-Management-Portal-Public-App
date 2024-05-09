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
    <title>options</title>
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
        <img src="/assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
    preloader -->

    @include('layoutsAdmin.main-header')

    @include('layoutsAdmin.main-sidebar')

    <!--=================================
    Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <h1>Liste des fillières</h1>
        <div>
            <a href="{{route('option.create')}}" class="btn btn-primary">Ajouter une fillière</a>
        </div>
        <div>
            <table class="crud">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liste_options as $option)
                    <tr>
                        <td>{{$option->id}}</td>
                        <td>{{$option->nom}}</td>
                        <td>
                            <a href="{{route('option.edit', ['option'=>$option->id])}}" class="btn btn-info">Editer</a>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet étudiant?')){document.getElementById('form-{{$option->id}}').submit()}" >Supprimer</a>
                            <form id="form-{{$option->id}}" action="{{route('option.supprimer', ['option'=>$option->id])}}" method="post">
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
    </body>
    </html>
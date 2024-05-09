<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @include('layoutsChef.head')      
    <title>Modules</title>
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

    @include('layoutsChef.main-header')

    @include('layoutsChef.main-sidebar')

    <!--=================================
    Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <h1>Liste des élements</h1>
        <div>
            <a href="{{route('element.create', ['module'=> $nom_module, 'year'=> $year])}}" class="btn btn-primary">Ajouter un élement</a>
        </div>
        <div>
            <table class="crud">
                <thead>
                    <tr>
                        <th>nom de l'élement</th>
                        <th>semestre</th>
                        <th>période</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liste_elements as $elements)

                    <tr>
                        <td>{{$elements->nom_elt}}</td>
                        <td>{{$elements->semestre}}</td>
                        <td>{{$elements->période}}</td>
                        <td>{{$elements->description}}</td>
                        <td>
                            <a href="{{route('element.edit', ['element' => $elements->id ])}}" class="btn btn-info">Editer</a>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet élement?')){document.getElementById('form-{{$elements->id}}').submit()}" >Supprimer</a>
                            <form id="form-{{$elements->id}}" action="{{route('element.supprimer', ['element'=>$elements->id])}}" method="post">
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
    @include('layoutsChef.footer')
    </div><!-- main content wrapper end-->
    <!--=================================
    footer -->
    @include('layoutsChef.footer-scripts')
    </body>
    </html>
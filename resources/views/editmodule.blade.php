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
        @include('layoutsChef.head')
        <title>Modules</title>

    </head>
    <style>
        h1{
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .mt-4{
            display: flex;
            justify-content: center;
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
        <h1>Modifier le module</h1>
        <div class="mt-4">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <form style="width:65%" method="post" action="{{route('module.update', ['module' => $module->id])}}">
            
            @csrf

            <input type="hidden" name="_method" value="put">
            <div class="form-group">
            <label for="exampleInputNom">Nom</label>
            <input type="text" class="form-control" placeholder="Enter nom" name="nom_module" value="{{$module->nom}}">
            </div>

            <div class="form-group">
                <label for="exampleInputNom">description</label>
                <input type="text" class="form-control" placeholder="Enter nom" name="description">
            </div>

            <label>L'année</label><br>
            <select name="year">
                <option selected>year</option>
                <option value="1">1 er année</option>
                <option value="2">2 eme année</option>
                <option value="3">3 eme année</option>
            </select><br>

            <label>semestre</label><br>
            <select name="semestre">
                <option selected>semestre</option>
                <option value="1">1 er semestre</option>
                <option value="2">2 eme semestre</option>
            </select><br>

            

            <button type="submit" class="btn btn-primary">Sauvegarder</button>
            <a href="{{route('module.ajouter')}}" type="Ajouter" class="btn btn-danger">Annuler</a>
        </div>
        </form>
    <!-- main-content -->
    <!--=================================
     footer -->
     @include('layoutsChef.footer')
    </div>
        <!--=================================
        footer -->
        @include('layoutsChef.footer-scripts')
    </body>
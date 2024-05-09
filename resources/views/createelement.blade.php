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
        <title>elements</title>
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
        <h1>Ajoutez un element</h1>
        <div class="mt-4">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <form style="width:65%" method="post" action="{{route('element.ajouter')}}">
            
            @csrf
            <div class="form-group">
            <label for="exampleInputNom">Nom</label>
            <input type="text" class="form-control" placeholder="Enter nom" name="nom_elt">
            </div>
            <div class="form-group">
                <label for="exampleInputNom">description</label>
                <input type="text" class="form-control" placeholder="Enter nom" name="description">
            </div>
            <label>Semestre</label><br>
            <select name="semestre">
                <option selected> semestre</option>
                <option value="1">semestre 1</option>
                <option value="2">semestre 2</option>
            </select><br>


            <label>période</label><br>
            <select name="période">
                <option selected> période</option>
                <option value="1">période 1</option>
                <option value="2">période 2</option>
            </select><br>

            <label>module</label><br>
            <select name="module">
                <option selected> module</option>
                @foreach ($modules as $module)
                <option value="{{$module->id}}">{{$module->nom_module}}</option>
                @endforeach
            </select><br>


            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{route('element')}}" type="Ajouter" class="btn btn-danger">Annuler</a>
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
    
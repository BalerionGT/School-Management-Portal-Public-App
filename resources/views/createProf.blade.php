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
        <title>Profs</title>
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
                <img src="assets/images/pre-loader/loader-01.svg" alt="">
            </div>
        
            <!--=================================
            preloader -->
        
            @include('layoutsAdmin.main-header')
        
            @include('layoutsAdmin.main-sidebar')
        
            <!--=================================
            Main content -->
        <h1>Ajoutez un prof</h1>
        <div class="mt-4">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <form style="width:65%" method="post" action="{{route('prof.ajouter')}}">
            
            @csrf
            <div class="form-group">
            <label for="exampleInputNom">Nom</label>
            <input type="text" class="form-control" placeholder="Enter nom" name="nom">
            </div>
            <div class="form-group">
            <label for="exampleInputPrénom">Prénom</label>
            <input type="text" class="form-control" placeholder="Enter pérenom" name="prenom">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <label>Chef de fillière</label><br>
            <select name="chef">
            <option value="1">Oui</option>
            <option value="0">Non</option>
            </select><br>

            <label>fillière du chef de fillière</label><br>
            <select name="fillière">
                @foreach($list_fillières as $fillière)
                <option value="{{$fillière->id}}">{{$fillière->nom}}</option>
                @endforeach
            </select><br>

            
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{route('prof')}}" type="Ajouter" class="btn btn-danger">Annuler</a>
        </div>
        </form>
    <!-- main-content -->
    <!--=================================
     footer -->
     @include('layoutsAdmin.footer')
    </div>
        <!--=================================
        footer -->
        @include('layoutsAdmin.footer-scripts')
    </body>
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
        <title>Students</title>
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
        <h1>Ajoutez un élève</h1>
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
        <div class="mt-4">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <form style="width:65%" method="post" action="{{route('students.ajouter')}}">
            
            @csrf
            <div class="form-group">
            <label for="exampleInputNom">Nom</label>
            <input type="text" class="form-control" placeholder="Enter nom" name="nom">
            </div>
            <div class="form-group">
            <label for="exampleInputPrénom">Prénom</label>
            <input type="text" class="form-control" placeholder="Enter pérenom" name="prénom">
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
            <div class="form-group">
                <label for="exampleInputPassword1">Numéro de telephone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="numéro de telephone" name="phone">
                </div>
            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            
            <label>La fillière</label><br>
            <select name="fillière_id">
                @foreach($liste_fillières as $fillière)
                <option value="{{$fillière->id}}">{{$fillière->nom}}</option>
                @endforeach
            </select><br>
            
            <label>L'année</label><br>
            <select name="year">
            <option selected>Class</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select><br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{route('students')}}" type="Ajouter" class="btn btn-danger">Annuler</a>
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
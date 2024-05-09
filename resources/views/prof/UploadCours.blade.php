<!DOCTYPE html>
<html lang="en">    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="/assets/js/lobilist.js"></script>  
        @include('layoutsProf.head')   
    </head>
    <style>
        .Upload , h2{
            position: relative;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
        }
        h2{
            margin-top: 4%;
            color: blue; /* Example color */
            font-size: 24px; /* Example font size */
        }
    
        /* Example additional styles */
        label {
            font-weight: bold;
        }
    
        select, input[type="file"], button {
            margin-bottom: 10px;
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
        
            @include('layoutsProf.main-header')
        
            @include('layoutsProf.main-sidebar')
        
            <!--=================================
            Main content -->
            @include('layoutsProf.main-header')
            
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <h2>Upload files</h2>
            <div class="Upload">
                <form action="{{ route('Uploadcours.prof')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Année</label><br>
                    <select name="year">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br>
                    <label>Fillière</label><br>
                    <select name="filliere" id="filliere-select">
                        @foreach($liste_fillière as $filliere)
                        <option value="{{ $filliere->id}}">{{ ucfirst($filliere->nom)}}</option>
                        @endforeach
                    </select><br>
                    <label>Module</label><br>
                    <select name="module" id="module-select">
                    </select>
                    <label>Element</label><br>
                    <input type="text" name="element"><br>
                    <label>Cours</label><br>
                    <input type="file" name="file"><br>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
     <!-- main-content -->
    <!--=================================
     footer -->
     @include('layoutsProf.footer')
    </div>
    <!--=================================
    footer -->
    @include('layoutsProf.footer-scripts')
    <script>
        $(document).ready(function () {
            $('#filliere-select').on('change', function () {
                let filliereId = $(this).val();
                $('#module-select').empty();
                $.ajax({
                    type: 'GET',
                    url: '/get-modules',
                    data: {
                        filliereId: filliereId
                    },
                    success: function (response) {
                        console.log(response);
                        $('#module-select').empty();
                        $('#module-select').append(`<option value="0" disabled selected>Select Module*</option>`);
                        response.forEach(element => {
                            $('#module-select').append(`<option value="${element.nom_module}">${element.nom_module}</option>`);
                        });
                    }
                });
            });
        });
    </script>
    </body>
</html>

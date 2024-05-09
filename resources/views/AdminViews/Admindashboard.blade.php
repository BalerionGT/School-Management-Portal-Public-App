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

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> Welcome {{ auth()->user()->name}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <a href="{{route('students')}}">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fas fa-user-graduate fa-4x"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Elèves</p>
                                        <h4><?php echo $students; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{route('prof')}}">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-warning">
                                            <i class="fas fa-chalkboard-teacher fa-4x"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Professeurs</p>
                                        <h4><?php echo $profs; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('chef')}}">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-success">
                                            <i class="fas fa-user-tie fa-4x"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Chefs de Filière</p>
                                        <h4><?php echo $chefs; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('option')}}">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-primary">
                                            <i class="fas fa-book-open fa-4x"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Filières</p>
                                        <h4><?php echo $options; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div> 
            
            
           

            
            <!--=================================
 wrapper -->

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

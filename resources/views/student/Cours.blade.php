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
    @include('layoutsProf.head') 
    <title>Course Files</title>
</head>
    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #337ab7;
            transition: color 0.3s;
        }

        a:hover {
            color: #23527c;
        }

        p {
            text-align: center;
            color: #888;
            margin-top: 20px;
        }
            .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3);
            width: 50%;
            text-align: center;
            padding: 1px;
            }
            .text {
                padding: 2px 3px;
            }
            .card-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 5px; /* Adjust the spacing between cards */
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
            <div class="container">
                <h1>Course Files</h1>

                @if (count($files) > 0)
                <div class="card-container">
                        @foreach ($files as $file)
                        <div class="card">
                            <div class="text">
                                <h2> cours </h2>
                            </div>
                            <img src="/assets/images/undraw_education_f8ru.png" alt="img">
                            <ul>
                                <a href="{{ route('file.download', ['file' => basename($file)]) }}">{{ basename($file) }}</a>
                            </ul>
                        </div>
                        @endforeach
                </div>
                @else
                    <p>No course files available.</p>
                @endif
            </div>
                        <!--=================================
            wrapper -->

                        <!--=================================
            footer -->
            @include('layoutsEleve.footer'
            )
            </div><!-- main content wrapper end-->
        </div>
    </div>
</div>

            <!--=================================
            footer -->

            @include('layoutsEleve.footer-scripts')

        </body>
</html>


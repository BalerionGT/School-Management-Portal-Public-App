<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item liste des Home-->
                    <li>
                        <a href="{{route('dashboard.admin')}}"><i class="ti-home"></i><span class="right-nav-text">Home
                            </span></a>
                    </li>                    
                    <!-- menu item Elèves -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#eleves">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">Elèves</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="eleves" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#annee1">
                                    <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">1ère Année</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="annee1" class="collapse" data-parent="#eleves">
                                    @foreach (App\Models\Fillière::all() as $fillière)
                                        <li><a href="{{ route('show.students', ['year' => 1 , 'fillière' => $fillière->nom]) }}">{{ $fillière->nom }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#annee2">
                                    <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">2ème Année</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="annee2" class="collapse" data-parent="#eleves">
                                    @foreach (App\Models\Fillière::all() as $fillière)
                                        <li><a href="{{ route('show.students', ['year' => 2 , 'fillière' => $fillière->nom]) }}">{{ $fillière->nom }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#annee3">
                                    <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">3ème Année</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="annee3" class="collapse" data-parent="#eleves">
                                    @foreach (App\Models\Fillière::all() as $fillière)
                                        <li><a href="{{ route('show.students', ['year' => 3 , 'fillière' => $fillière->nom]) }}">{{ $fillière->nom }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                   
                    
                    <!-- menu item liste des Professeurs-->
                    <li>
                        <a href="{{route('prof')}}"><i class="ti-user"></i><span class="right-nav-text">Professeurs
                            </span></a>
                    </li>
                    <!-- menu item liste des chefs de filière-->
                    <li>
                        <a href="{{route('chef')}}"><i class="ti-user"></i><span class="right-nav-text">Chefs De Filères
                            </span></a>
                    </li>
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#filières">
                        <div class="pull-left"><i class="ti-menu-alt"></i><span class="right-nav-text">Filières</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                        </a>
                        <ul id="filières" class="collapse" data-parent="#sidebarnav">
                            @foreach (App\Models\Fillière::all() as $fillière)
                            <li><a href="{{ route('admin.filiere.' . strtolower($fillière->nom)) }}">{{ $fillière->nom }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                   
                           
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                   
                    <!-- menu item liste des élèves-->
                    <li>
                        <a href="{{ route('profil.chef') }}"><i class="ti-user"></i><span class="right-nav-text">Profil
                            </span></a>
                    </li>
                    <!-- menu item Elèves -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#eleves">
                            <div class="pull-left"><i class="ti-book"></i><span class="right-nav-text">Cours</span></div>
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
                            <!-- Filière = Module-->
                                <ul id="annee1" class="collapse" data-parent="#eleves">
                                @foreach ($modules as $module)
                                    @if ($module->year == 1)
                                    <li><a href="{{ route('element', ['year' => 1, 'module' => $module->nom_module]) }}">{{ $module->nom_module }}</a></li>
                                    @endif
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
                                @foreach ($modules as $module)
                                    @if ($module->year == 2)
                                    <li><a href="{{ route('element', ['year' => 2, 'module' => $module->nom_module]) }}">{{ $module->nom_module }}</a></li>
                                    @endif
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
                                @foreach ($modules as $module)
                                    @if ($module->year == 3)
                                        <li><a href="{{ route('element', ['year' => 3, 'module' => $module->nom_module]) }}">{{ $module->nom_module }}</a></li>
                                    @endif
                                @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                   
                    
                    <!-- menu item Calendrier-->
                    <li>
                        <a href="{{route('calendar.chef')}}"><i class="ti-calendar"></i><span class="right-nav-text">Calendrier
                            </span></a>
                    </li>

                    <!-- menu item mailbox-->
                    <li>
                        <a href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1685406428&rver=7.0.6737.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fnlp%3d1%26RpsCsrfState%3d98cb9bc9-28f3-639b-6e48-392306f849f1&id=292841&aadredir=1&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=90015"><i class="ti-email"></i><span class="right-nav-text">Mail
                                box</span></a>
                    </li>                        
     
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

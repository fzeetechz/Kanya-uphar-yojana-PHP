<div id="loading"></div>
    <header class="main-header">
    <nav class="navbar navbar-static-top mt-1">
        <div class="navbar-main">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"  href="{{route('front.index')}}"><img src="{{ asset('front/assets/images/logo-9.png')}}" style="margin-top: -14px !important; border-radius: 2px;"  width="300" height="60" alt=""></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse pull-right">
                    <ul class="nav navbar-nav" style="text-transform: uppercase;">
                        <li><a class="{{ (request()->is('/*'))       ? 'is-active'   : '' }}" href="{{route('front.index')}}">HOME</a></li>
                        <li><a class="{{ (request()->is('registrations/create*'))  ? 'is-active'   : '' }}" href="{{route('front.registrations.create')}}">Registration</a></li>
                        <li><a class="{{ request()->is('registrations/find-registration*') || request()->is('registrations/show/detail*')  ? 'is-active'   : '' }}" href="{{route('front.registrations.registration-find')}}">Find Registration</a></li>
                        @auth
                            <li>
                                <a class="{{ (request()->is('payment-details*'))  ? 'is-active'   : '' }}" href="{{ route('front.payment_details.show') }}">Payment</a>
                            </li>
                            <li>
                                <a  href="{{ route('admin.dashboard') }}">My Panel</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        @endauth
                        @guest
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        @endguest
                    </ul>
                </div> <!-- /#navbar -->
            </div> <!-- /.container -->
        </div> <!-- /.navbar-main -->
    </nav>
</header> <!-- /. main-header -->
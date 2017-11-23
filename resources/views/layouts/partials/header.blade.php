<header>
    <!--navbar-->
    <nav class="navbar navbar-default navbar-fixed-top topnav">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">@lang('Syal')</a>
            </div>
            <button class="navbar-toggler btn " type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">@lang('menu')</span>
            </button>
            <div class="collapse navbar-collapse  navbar-right" id="navbarNav">
                <ul class="navbar-nav">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="/">@lang('Home')</a></li>

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                href="#">{{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @if(auth()->user()->role == "regular")
                                    <li><a href="/edit">@lang('Edit Profile')</a></li>
                                @endif
                                <li><a href="/changePassword">@lang('change password')</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('Logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                href="#">@lang('Language')<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/language/ar">@lang('Arabic') </a></li>
                                <li><a href="/language/en">@lang('English') </a></li>
                            </ul>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
</header>

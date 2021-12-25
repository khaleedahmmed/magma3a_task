    <!-- header area start -->
    <header>
        <div class="header-top sticky bg-white d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <!-- header top navigation start -->
                        <div class="header-top-navigation">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('website.index') }}">Home</a></li>
                                   @auth
                                       <li><a href="{{ route('website.profile') }}">Profile</a></li>
                                    @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    @endauth

                                </ul>
                            </nav>
                        </div>
                        <!-- header top navigation start -->
                    </div>



                    <div class="col-md-5">
                        <div class="header-top-right d-flex align-items-center justify-content-end">
                            <!-- profile picture start -->
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                    <a href="javascript:void(0)" class="profile-triger">
                                        <figure>
                                            <img src="{{ url('/Images/Avatar/avatar.png') }}" alt="profile picture">
                                        </figure>
                                    </a>
                                    @guest

                                    @else
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <h5 class="name">{{ Auth::user()->name }}</h5>
                                            <h5 class="name">{{ Auth::user()->email }}</h5>
                                        </div>
                                        <div class="profile-body">

                                            <ul>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <li>  <button type="submit" class="flaticon-unlock">Logout</button></li>
                                                  </form>
                                            </ul>
                                        </div>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                            <!-- profile picture end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->


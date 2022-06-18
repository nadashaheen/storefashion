<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="{{route('home')}}">Store</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('clothes')}}">Clothes</a></li>
                        <li><a href="{{route('categories')}}">Categoies</a></li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        <li><a href="{{route('logout')}}">
                            <i class="{{asset('fa fa-sign-out-alt')}}"></i>
                            </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

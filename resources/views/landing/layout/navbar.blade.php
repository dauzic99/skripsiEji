<div class="navbar navbar-inverse" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.html">
                <h1>BPSDM</h1>
            </a>

        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ request()->segment(1) == '' ? 'active' : '' }}"><a
                        href="{{ route('landing') }}">Home</a>
                </li>


            </ul>
        </div>
        <div class="search">
            <a href="{{ route('login') }}">
                <i class="fa fa-sign-in"></i>
            </a>
        </div>
    </div>
</div>
</header>
<!--/#header-->

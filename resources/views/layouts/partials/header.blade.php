<div class="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <a class="navbar-brand" href="#">{{ trans('layout.title') }}</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="active">{{ trans('layout.home') }}</a></li>
                        <li><a href="#">{{ trans('layout.blog') }}</a></li>
                        <li><a href="#">{{ trans('layout.method') }}</a></li>
                        <li><a href="#">{{ trans('layout.mailUs') }}</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation" class="dropdown">
                            <img src="images/default.png" alt="" id="avatar_display">
                            {{ Html::image(Auth::user()->avatar, 'avatar', ['class' => 'img-responsive', 'id' => 'avatar_display']) }}
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Username <span class="caret"></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">{{ trans('layout.profile') }}</a></li>
                                <li><a href="#">{{ trans('layout.logout') }}</a></li>
                                <li><a href="{{ route('profiles.show', ['id' => Auth::user()->id]) }}"><i class="fa fa-user" aria-hidden="true"></i> {{ trans('layout.profile') }}</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>{{ trans('layout.logout') }}</a></li>
                            </ul>
                        </li>
                      </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>

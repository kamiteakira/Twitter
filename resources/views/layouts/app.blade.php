<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Twitter Clone') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modaal.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Home') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item" style="display:flex; justify-content: center;align-items: center;">
                                <a class="navbar-brand" href="{{ route('user_list') }}" style="font-size:13px">
                                    {{ __('ユーザ一覧') }}
                                    <!-- {{ config('app.name', 'Laravel') }} -->
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <!-- <span class="caret"></span> -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item">
                                {{Html::link('#inline', __('ツイート'), ['class' => "inline btn btn-primary"])}}
                            </li>

                            <div id="inline" style="display:none;" >
                                <h4>ツイートする</h4>

                                {!! Form::open(['id' => 'formTweet', 'url' => 'tweet/', 'enctype' => 'multipart/form-data']) !!}
                                    {!! Form::textarea('body', null, ['name' => 'tweet', 'class' => 'form-control', 'placeholder' => '今なにしてる？', 'rows' => '4']) !!}
                                    <button id="btnTweet" type="button" class="btn btn-primary" style="margin-top:10px;float:right;margin-bottom:10px">
                                        {{ __('ツイート') }}
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script><!-- Scripts（Jquery） -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Scripts（bootstrapのjavascript） -->
    <script src="{{ asset('js/modaal.min.js') }}" defer></script>
    <script>
        $(function(){

            $('.inline').modaal({
                width: 600,
                hide_close: true,
            	// type: 'ajax',	// コンテンツのタイプを指定
            	animation_speed: '500', 	// アニメーションのスピードをミリ秒単位で指定
            	// background: '#fff',	// 背景の色を白に変更
            	overlay_opacity: '0.75',	// 背景のオーバーレイの透明度を変更
            	// fullscreen: 'true',	// フルスクリーンモードにする
            	background_scroll: 'true',	// 背景をスクロールさせるか否か
            	loading_content: 'Now Loading, Please Wait.'	// 読み込み時のテキスト表示
            });

            $("#btnTweet").click(function() {
                $("#formTweet").submit();
            });
        });
    </script>


</body>
</html>

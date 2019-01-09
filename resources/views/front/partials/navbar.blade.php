<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
    <div class="container">
        <a href="#" class="d-block mx-auto text-center">
            <img src="{{asset('img/logo.png')}}" width="70" height="auto"  alt="" />
        </a>
        @if (!Auth::check())
            <a class="" href="{{ route('login') }}">ログイン</a>
        @else
            <a class="" href="{{ route('logout') }}">ログアウト</a>
        @endif
    </div>
</nav>
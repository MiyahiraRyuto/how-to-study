<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-light">
        <a class="navbar-brand" href="/"><font color="black">How to study</font></a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item"><a href="{{ route('users.show',['user' => Auth::id()]) }}" class="nav-link "><font color="#00FFFF">ユーザー詳細</font></a></li>
                <li class="nav-item"><a href="{{ route('posts.create',['user' => Auth::id()]) }}" class="nav-link "><font color="#FF0000">投稿</font></a></li>
                <li class="nav-item"><a href="{{ route('logout.get')}}"  class="nav-link "><font color="#000000">ログアウト</font></a></li>
                @else
                <li class="nav-item"><a href="{{ route('signup.get') }}" class="nav-link "><font color="#0B6121">会員登録</font></a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link "><font color="#00FFFF">ログイン</font></a></li>
               @endif
            </ul>
        </div>
    </nav>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">販売管理システム</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            @php
                $shiire_url = '#';
                $zaiko_url = '#';
                if (url()->current() != url('/shiire')) {
                    $shiire_url = url('/shiire');
                } elseif (url()->current() != url('/zaiko')) {
                    $zaiko_url = url('/zaiko');
                }
            @endphp
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ $zaiko_url }}">在庫管理</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ $shiire_url }}">仕入管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">販売管理</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        マスタ管理
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">テスト1</a></li>
                        <li><a class="dropdown-item" href="#">テスト2</a></li>
                        <li><a class="dropdown-item" href="#">テスト3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ログアウト</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

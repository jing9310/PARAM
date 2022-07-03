<header class="navbar navbar-expand-lg navbar-light pt-5">
    <div class="container-md pl-5">
        <a class="navbar-brand pl-5 font-weight-bold" href="{{ route('doctor.home.index') }}">PARAM</a>
    </div>
    <ul class="row nav justify-content-end pr-5">
        <li class="nav-item nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16" style="color: #6574cd;">
                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <a href="{{ route('doctor.mypage.edit', Auth::user()->id) }}" style="color: #6574cd;">マイページ</a>
        </li>
        <li class="nav-item nav-link">
            <form id ="logout-form" method="POST" action="{{ route('doctor.logout') }}">
            @csrf
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16" style="color: #6574cd;">
                    <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
                <button type='submit' class="my-navbar-item" style="border: none; background: none; color: #6574cd;">ログアウト</button>
            </form>
        </li>
    </ul>
</header>
<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
        <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center">
            <strong>مدونتي</strong>
        </a>
            @guest
            @else
                <a href="#" class="navbar-brand">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">تسجيل خروج</button>
                    </form>
                </a>
            @endguest

        </div>
    </div>
</header>

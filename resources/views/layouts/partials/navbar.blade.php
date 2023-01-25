<header class="p-3 bg-light text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

      @auth
        <h4 class="text-dark mb-0 mr-2">{{auth()->user()->name}}</h4>
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-primary">Logout</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-primary mr-2">Login</a>
          <a href="{{ route('register.perform') }}" class="btn btn-secondary">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>
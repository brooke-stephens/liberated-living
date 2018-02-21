<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ URL::to('/') }}">Brand</a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav right">
      
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.getShoppingCart') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
        <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQty : "" }}</span>

      </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
          User Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if (Auth::check())
            <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
            <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
          @else
            <a class="dropdown-item" href="{{ route('user.signup') }}">Sign Up</a>
            <a class="dropdown-item" href="{{ route('user.signin') }}">Sign In</a>
          @endif



         
        </div>
      </li>
    </ul>
  </div>
</nav>
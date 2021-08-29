<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
  <div class="container">

  <a class="navbar-brand text-white" href="/"><h2>Home Page</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('category.index') }}">@lang('dashboard.categoreys')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('product.index') }}">product</a>
        </li>
      </ul>

      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">product</a>
        </li>
      </ul>

    </div>{{-- navbar-collapse --}}
  </div>{{-- container --}}
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel Project</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('service') }}">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('subcategory.index') }}">Sub Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('products.create') }}">Add New Products</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

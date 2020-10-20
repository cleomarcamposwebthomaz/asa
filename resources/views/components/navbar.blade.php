<nav class="navbar navbar-expand-xl navbar-light bg-light sf-menu">
  <a class="navbar-brand d-none" href="#">Menu</a>

  <a class="navbar-brand" href="/">
      <img src="{{ asset('img/logo-1.png') }}" alt="Logo" />
  </a>

  <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img src="{{ asset('img/menu.png') }}" alt="Menu" />
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          {{ treeCategories($categories->toArray()) }}

          <li class="nav-item">
              <a class="nav-link hvr-underline-reveal" href="{{ route('post') }}" aria-disabled="true">BLOG</a>
          </li>
          <li class="nav-item">
              <a class="nav-link hvr-underline-reveal" href="/contato" aria-disabled="true">CONTATO</a>
          </li>
      </ul>
  </div>
</nav>

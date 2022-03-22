<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produitss</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
</head>
<body>

    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="#">
            <h1><strong>COZA </strong> STORE</h1>
          </a>

          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">

            <a class="navbar-item" href="{{route('categories.index')}}">
              Gestions des Catégories
            </a>

            <a class="navbar-item" href="{{route('types.index')}}">
              Gestions des Types
            </a>


              <a class="navbar-item" href="{{ route('produits.index')}}">
                Gestions des Produits
              </a>
        </div>

          <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable" style="margin-right:60px;" >
                    <a class="navbar-link">
                        @auth
                        {{ Auth::user()->name }}
                            @else
                            Anonyme

                        @endauth
                    </a>
                    <div class="navbar-dropdown is-boxed">
                      <a class="navbar-item" href="{{route('logout')}}">
                        se déconnecter
                      </a>
                    </div>

              </div>
            </div>
          </div>
        </div>
      </nav>

<main class="section" style="margin-top:30px;">
    <div class="container">
        @yield('content')
    </div>
    </main>
    </body>

</html>


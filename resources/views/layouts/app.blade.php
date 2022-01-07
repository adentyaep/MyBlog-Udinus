<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>Panel Admin</title>
    
    <style>
      .link-menu{
        color: white;
      }

      .link-menu:hover{
        color: white;
        text-decoration: none;
      }

      .jumbotron {
            padding: 50px;
            margin-bottom: 25rem;
            background-color: 	#ebebeb;
	          background-size: cover;	  
        }
        .lead{
            font-size: 1.25rem;
            font-weight: 300;
        }

    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ url('admin') }}" class="navbar-brand">CMS BLOG</a>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('admin') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/category') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/slider') }}">Slider</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/post') }}" >Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/mainmenu') }}" >Main Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/message') }}" >Message</a>
                </li>
              </ul>
              <div class="my-2 my-lg-0">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary active">
                    <a href="{{ url('admin/profile/'.session('admin_id')) }}" class="link-menu">Profile</a>
                  </label>
                  <label class="btn btn-secondary">
                    <a href="{{ url('logout') }}" class="link-menu">Logout</a>
                  </label>
                </div>
              </div>
          </div>
      </div>
  </nav>
  <main>
    <div class="container mt-3">
        @yield('content')
    </div>
  </main>

  <footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="medium text-center text-muted fst-italic p-4">Copyright &copy; Udinus 2021</div>
            </div>
        </div>
    </div>
</footer>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
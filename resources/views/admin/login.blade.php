<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>

    <style type="text/css">
        body{
            background: #c8e1f7;
        }
    </style>
  </head>
  <body>
        <div class="container mt-5 p-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <img src="assets/images/udinus.jpg" alt="" class="card-img-top">
                        </div>
                        <div class="col-lg-5">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (Session::has('status'))
                                <div class="alert alert-warning" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <form action="{{ url('login') }}" method="POST">
                                @csrf
                                <h3>Form Login</h3>
                                <hr>
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required><br>
                            
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required><br>
                            
                                <input type="submit" name="submit" class="btn btn-md btn-primary" value="login">
                                <a href="register" class="btn btn-warning">Register</a>
                            
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

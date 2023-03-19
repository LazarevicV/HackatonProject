<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="../public/style.css">-->

    <link rel="stylesheet" href="{{asset('/style.css')}}">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login page</title>
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>
                        <form action="{{route('loginUser')}}" method="POST">
                            @csrf
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX-2">Lozinka</label>
                            </div>

                            <!-- Checkbox -->


                            <button class="btn btn-primary btn-lg btn-block" type="submit">Uloguj se</button>
                            @if(session()->get("invalid_login"))
                                <p class="text-danger mt-4">{{session()->get("invalid_login")}}</p>
                            @endif

                            @error("email")
                            <p class="text-danger mt-4">{{$message}}</p>
                            @enderror
                            @error("password")
                            <p class="text-danger"> {{$message}}</p>

                            @enderror



                            <hr class="my-4">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

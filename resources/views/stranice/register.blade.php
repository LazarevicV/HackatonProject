@extends('layout.main_layout')

@section('title')
    Registracija
@endsection

@section('content')

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Register</h3>
                            @if($errors->any())
                                @foreach($errors->all() as $err)
                                    <div>
                                        <p class="alert alert-danger">{{$err}}</p>
                                    </div>
                                @endforeach
                            @endif
                            <form action="/register" method="post">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" id="" name="first_name" class="form-control form-control-lg" value="David"/>
                                    <label class="form-label" for="typeEmailX-2" >Ime</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" name="last_name" class="form-control form-control-lg"  value="Stevic"/>
                                    <label class="form-label" for="typeEmailX-2">Prezime</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="username" name="username" class="form-control form-control-lg"  value="dacha"/>
                                    <label class="form-label" for="email">Korisničko ime</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"  value="dacha@gmail.com"/>
                                    <label class="form-label" for="email">E-mail</label>
                                </div>



                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"  value="Sifra123"/>
                                    <label class="form-label" for="typePasswordX-2">Šifra</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password_repeat" id="typeEmailX-2" class="form-control form-control-lg"  value="David"/>
                                    <label class="form-label" for="typeEmailX-2">Ponovite šifru</label>
                                </div>

                                <!-- Checkbox -->


                                <input class="btn btn-primary btn-lg btn-block" type="submit"/>

                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layout.main_layout')

@section('title')
    Registracija
@endsection

@section('content')

    <section class="vh-100 mt-5" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center col-12 m-0">
                <div class="col-12 col-md-8 col-lg-9 col-xl-8">
                    <div class="card shadow-2-strong col-md-12" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Nova lokacija</h3>
                            @if($errors->any())
                                @foreach($errors->all() as $err)
                                    <div>
                                        <p class="alert alert-danger">{{$err}}</p>
                                    </div>
                                @endforeach
                            @endif
                            @if(session()->has("uspesno"))
                            <p>{{session()->get("uspseno")}}</p>
                            @endif
                            <form action="{{route("send_request")}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-4">
                                    <select class="form-select form-control form-control-lg" name="city_id" aria-label="Default select
                                    example">
                                        @foreach($data['gradovi'] as $grad)
                                            <option  value="{{$grad->id}}">{{$grad->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="grad">Grad</label>
                                </div>
                        <!--KATEGORIJEEE-->
                                <div class="accordion mb-5" id="accordionExample">
                                    @foreach($data['category_parent'] as $i => $parent)
                                    <div class="card bg-light">
                                        <div class="card-header" id="headingTwoPet{{$parent->id}}">
                                            <h5 class="mb-0">
                                                <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapsePet{{$parent->id}}" aria-expanded="false" aria-controls="collapsePet{{$parent->id}}">
                                                  {{$parent->name}}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapsePet{{$parent->id}}" class="collapse" aria-labelledby="headingPet{{$parent->id}}" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach($data['category_child'] as $p => $child)
                                                    @if($parent->id == $child->id_parent)
                                                    <div class="form-outline mb-4">
                                                            <input class="form-check-input" type="radio"
                                                                   name="category_id"
                                                                   value="{{$child->id}}"
                                                                   id="{{$child->name}}{{$child->id}}">
                                                            <label class="form-check-label text-left" for="{{$child->name}}{{$child->id}}">
                                                                {{$child->name}}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach

                                </div>





                                <!--KRAJ KATEGORIJAAA-->

                                <div class="form-outline mb-4">
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                           placeholder="Unesite ime: "/>
                                    <label class="form-label" for="name">Naziv</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="file" id="name" name="image" class="form-control form-control-lg"/>
                                    <label class="form-label" for="name">Prilozite sliku</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="address" name="address" class="form-control form-control-lg"
                                           placeholder="Unesite adresu: "/>
                                    <label class="form-label" for="adress">Adresa</label>
                                </div>
                                <div class="d-flex col-12" style="justify-content: space-evenly">
                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="discount"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Popust
                                        </label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="parking"
                                               value=""
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Parking
                                        </label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="toilet"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            WC
                                        </label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="elavator"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Lift
                                        </label>
                                    </div>

                                </div>

                                <div class="d-flex col-12" style="justify-content: space-evenly">
                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="ground_level"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Prizemlje
                                        </label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="wheelchair_entrance"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kolica
                                        </label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input class="form-check-input" type="checkbox"
                                               name="wheelchair_entrance"
                                               id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Profesionalno osoblje
                                        </label>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                        <textarea id="adresa" name="description" class="form-control
                                        form-control-lg" placeholder="Unesite neke dodatne informacije"></textarea>
                                </div>
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

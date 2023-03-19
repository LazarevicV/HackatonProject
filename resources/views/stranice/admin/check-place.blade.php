@extends('layout.main_layout')

@section('title')
    Verivikacija lokacije
@endsection
@section('content')
<section class="vh-100 mt-5" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center col-12 m-0">
            <div class="col-12 col-md-8 col-lg-9 col-xl-8">
                <div class="card shadow-2-strong col-md-12" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Provera zahteva za unos nove lokacije</h3>
                        <form action="/send_request_to_add_place" method="post">
                            @csrf

                            <div class="form-outline mb-4">
                                <select id="grad" class="form-select form-control form-control-lg"
                                        aria-label="Default
                                    select
                                    example"
                                        name="city"
                                >
                                    @foreach($data['cities'] as $c)
                                        @if($data['obj']->id_city == $c->id)
                                            <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                        @else
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <label class="form-label" for="grad">Grad</label>
                            </div>

                            <div class="form-outline mb-4">

                                <select id="category" class="form-select form-control form-control-lg"
                                        aria-label="Default
                                    select
                                    example"
                                        name="id_category"
                                >
                                    @foreach($data['categories'] as $c)
                                        @if($data['obj']->id_category == $c->id)
                                            <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                        @elseif($c->id_parent != null)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <label class="form-label" for="grad">Kategorija</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="name" name="name" value="{{$data["obj"]->name}}" class="form-control
                                    form-control-lg"
                                       placeholder="Unesite ime: "/>
                                <label class="form-label" for="name">Ime</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="adress" name="adress" value="{{$data['obj']->address}}" class="form-control form-control-lg"
                                       placeholder="Unesite adresu: "/>
                                <label class="form-label" for="adress">Adresa</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="x" name="x" value="" class="form-control form-control-lg"
                                       placeholder="Unesite X koordinatu:"/>
                                <label class="form-label" for="adress">X koordinata</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="y" name="y" value="" class="form-control form-control-lg"
                                       placeholder="Unesite Y koordinatu: "/>
                                <label class="form-label" for="adress">Y koordinata</label>
                            </div>
                            <div class="d-flex col-12" style="justify-content: space-evenly">
                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="discount"
                                           id="discount"
                                           @if($data["obj"]->discount) value="1" checked @else value="0" @endif>
                                    <label class="form-check-label" for="discount">
                                        Popust
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="parking"
                                           id="parking"
                                           @if($data["obj"]->parking == 1) value="1" checked @else value="0" @endif>

                                    <label class="form-check-label" for="parking">
                                        Parking
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="toilet"
                                           id="toilet"
                                           @if($data["obj"]->toilet) value="1" checked @else value="0" @endif>

                                    <label class="form-check-label" for="toilet">
                                        WC
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="elavator"
                                           id="elavator"
                                           @if($data["obj"]->elavator) value="1" checked @else value="0" @endif>

                                    <label class="form-check-label" for="elavator">
                                        Lift
                                    </label>
                                </div>

                            </div>

                            <div class="d-flex col-12" style="justify-content: space-evenly">
                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="ground_level"
                                           id="ground_level"
                                           @if($data["obj"]->ground_level) value="1" checked @else value="0" @endif>

                                    <label class="form-check-label" for="ground_level">
                                        Prizemlje
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="wheelchair_entrance"
                                           id="wheelchair_entrance"
                                           @if($data["obj"]->wheelchair_entrance) value="1"  checked @else value="0" @endif>

                                    <label class="form-check-label" for="wheelchair_entrance">
                                        Kolica
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input class="form-check-input" type="checkbox"
                                           name="stuff"
                                           id="stuff"
                                           @if($data["obj"]->professional_staff) value="1" checked @else value="0" @endif>

                                    <label class="form-check-label" for="stuff">
                                        Profesionalno osoblje
                                    </label>
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                        <textarea id="dodatneInformacije" name="description" value="{{$data['obj']->description}}" class=" text-left form-control
                                        form-control-lg" placeholder="Unesite neke dodatne informacije">
                                            {{$data['obj']->description}}
                                        </textarea>
                            </div>
                            <div  class="row h-100 col-md-12 d-flex justify-content-around">
                                <button id="sacuvaj" type="button" class="btn btn-success dugme_zeleno">Sacuvaj</button>

                                <button id="otkazi" id-place="{{$data['obj']->id}}" type="button" class="btn btn-danger
                                    dugme_crveno">Obrisi</button>

                            </div>

                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var urlToVerfy = "{{route("verified_place")}}";
    var idPlace = {{$data['obj']->id}};
</script>
<script src="main2.js"></script>
@endsection


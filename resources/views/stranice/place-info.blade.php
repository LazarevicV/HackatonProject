@extends('layout.main_layout')

@section('title')
    Registracija
@endsection

@section('content')
<section>
    <div class="container my-2">
        <div class="card d-flex flex-row py-2">
            <img class="col-8 card-img-top zaobljeno" src="{{asset('public/images/' . $data['place']->src)}}" alt="Card image cap" />
            <div class="card-body">
                <h3 class="card-title">{{$data['place']->name}}</h3>
                <p class="card-text">{{$data['place']->description}}</p>
                @if($data['place']->wc == 1) Toalet prilagodjen invalidima <br/>@endif
                @if($data['place']->discount == 1) Popust za invalide <br/>@endif
                @if($data['place']->ground_lever == 1) Lokal u prizemlju <br/>@endif
                @if($data['place']->professional_staff == 1) Ljubazno osoblje <br/> @endif
                @if($data['place']->wheelchair_entrance == 1) Ulaz prilagodjen kolicima <br/>@endif
                @if($data['place']->elevator == 1) Lift <br/>@endif
                @if($data['place']->parking == 1) Rezervisan parking <br/>@endif

                <div class="brojKolacica">
                    <div id="full-stars-example-two">
                        @if($data['rate_count'] >0)
                        <p class="text-center">Prosecna ocena <b>{{round((float)$data['rate'] / (float)$data['rate_count'],2)}}</b></p>
                        @else
                            <p class="text-center">Lokacija jos nije ocenjena</p>
                        @endif
                            <div class="rating-group">
                            <input disabled checked redni-br="1" class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i
                                    class="rating__icon rating__icon--star fas fa-cookie-bite"></i></label>
                            <input redni-br="2"  class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                            <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fas fa-cookie-bite"></i></label>
                            <input redni-br="3"  class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fas fa-cookie-bite"></i></label>
                            <input redni-br="4"  class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fas fa-cookie-bite"></i></label>
                            <input  redni-br="5"  class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fas fa-cookie-bite"></i></label>
                            <input redni-br="6"  class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($data['comments'] as $comment)
        <div class="my-2">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center">
                        <span><small class="font-weight-bold text-primary">
                                @foreach($data['all_users'] as $u)
                                @if($comment->id_user == $u->id)
                                    {{$u->username}}
                                @endif
                                @endforeach
                            </small> <small class="font-weight-bold">
                                {{$comment->comment}}
                                    </small>
                            </span>
                    </div>
                    <small>{{$comment->created_at}}</small>
                </div>

            </div>
        </div>
        @endforeach


    </div>

</section>
    <script>
        var id_place_ = "{{$data['place']->id}}";
    </script>
@endsection

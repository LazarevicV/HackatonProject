@extends('layout.main_layout')

@section('title')
    Verivikacija lokacije
@endsection
@section('content')
    <section>
        <div class="container">
            <h2>Sve lokacije</h2>

            <table class="table table-striped">
                <tbody id="telo-tabele">
                @if(count($data['places']) == 0)<div class="alert"> <p class="text-danger">Trenutno nema nijednog zahteva za unos nove lokacije</p></div>
                @else
                    @foreach($data['places'] as $place)
                        <tr style=" display: flex; text-align: center">
                            <td><img src="{{asset("public/images/".$place->src)}}" alt="{{$place->alt}}" width="100%" height="100%"/></td>
                            <td style="display: flex; justify-content: center; align-items: center">
                                <a href="{{route('place-info-page').'/'.$place->id}}" target="_blank">
                                    <h4>{{$place->name}}.</h4>
                                </a>
                            </td>
                            <td style="display: flex; justify-content: center; align-items: center;
                        text-align: left">
                                {{$place->description}}
                            </td>
                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
        </div>
    </section>

@endsection


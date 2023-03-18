@extends('layout.main_layout')

@section('title')
    Title
@endsection

@section('content')
    <div class="d-flex justify-content-around bg-success">
        <div class="card my-2" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
        <div class="card my-2" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div><div class="card my-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h1><legend>You WIN !!!!</legend></h1>
                    <p id="guessbutton2">
                        <a id="guessbutton2" href="/home" target="_blank" class="btn btn-outline-primary">Play Again</a>
                    </p>

                    <p id="guessbutton2">
                        <a id="guessbutton2" href="http://google.com" target="_blank" class="btn btn-outline-secondary">Exit</a>
                    </p>
                </blockquote>


            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hanged Game</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <blockquote class="blockquote mb-0">
                        <p>
                           Tus puntos actuales son: {{ Auth::user()->points }}
                        </p>
                        <?php $data = "/play?word=" . urlencode($data) ?>
                                <a href={{$data}}  class="btn btn-primary" role="button">Play</a>
                            </blockquote>
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection
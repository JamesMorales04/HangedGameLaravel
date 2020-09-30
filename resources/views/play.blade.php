@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form method="POST">
                        {{csrf_field()}}
                        <h1><p><label id="currentWord" for="nam"><?php print($_POST['currentWord']) ?></label></p></h1>
                        <h3><p><label id="currentLifes" for="nam"><?php print("Vidas: ".$_POST['currentLifes']) ?></label></p></h3>
                        <h3><p><label for="nam"><?php print("Valor Ingresado: ".$_POST['enteredValue']) ?></label></p></h3>



                        <input id="wordToGuess" type="hidden" name="wordToGuess" value="<?php print($_POST['wordToGuess']) ?>" />
                        <input id="currentWord" type="hidden" name="currentWord" value="<?php print($_POST['currentWord']) ?>" />
                        <input id="currentLifes" type="hidden" name="currentLifes" value="<?php print($_POST['currentLifes']) ?>" />
                        <fieldset id="enteredValue">
                            <h3><legend>Ingresa una letra o adivina la palabra</legend></h3>
                            <input id="guesstext" type="text" name="enteredValue" autofocus id="two" />
                            <input id="guessbutton" type="submit" value="Guess" id="two" class="btn btn-primary" />
                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
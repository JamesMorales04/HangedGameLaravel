<?php

namespace App\Http\Controllers;

use PhpParser\Node\Expr\Print_;

class PlayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function initialicer(){
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method 
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $decryption_iv = '1234567891011121';

        // Store the decryption key 
        $decryption_key = "GeeksforGeeks";

        // Use openssl_decrypt() function to decrypt the data 
        $decryption = openssl_decrypt(
            $_GET['word'],
            $ciphering,
            $decryption_key,
            $options,
            $decryption_iv
        );

        if (isset($_POST['wordToGuess']) == "") {

            $_POST['wordToGuess'] = "";
            $_POST['currentWord'] = "";
            $_POST['errorInfo'] = "";
            $_POST['enteredValue'] = "";
            $_POST['currentLifes'] = 5;

            for ($i = 0; $i < strlen($decryption); $i++) {
                $_POST['wordToGuess'] .= $decryption[$i] . "_";
                $_POST['currentWord'] .= "_" . "\t";
            }
        }

        return $_POST;
    }
    public function game()
    {

        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method 
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $decryption_iv = '1234567891011121';

        // Store the decryption key 
        $decryption_key = "GeeksforGeeks";

        // Use openssl_decrypt() function to decrypt the data 
        $decryption = openssl_decrypt(
            $_GET['word'],
            $ciphering,
            $decryption_key,
            $options,
            $decryption_iv
        );
        
        if (array_key_exists('enteredValue', $_POST)) {
            if (strlen($_POST['enteredValue']) > 0) {
                if (is_numeric($_POST['enteredValue'])) {
                    $_POST['errorInfo'] = "Please enter a valid character";
                } else {
                    if ($_POST['enteredValue'] == $decryption) {
                        $_POST['currentWord'] = $_POST['enteredValue'];
                    } else {
                        $_POST['enteredValue'] = $_POST['enteredValue'];
                        if (strpos($_POST['wordToGuess'], $_POST['enteredValue']) !== false) {
                            for ($i = 0; $i < strlen($_POST['wordToGuess']); $i++) {
                                if ($_POST['wordToGuess'][$i] == $_POST['enteredValue']) {
                                    $_POST['currentWord'][$i] = $_POST['enteredValue'];
                                }
                            }
                        } else {
                            --$_POST['currentLifes'];
                            if ($_POST['currentLifes'] == 0) {
                                return redirect()->to('/lose')->send();
                            }
                        }
                    }
                    $auxiliar = preg_replace('/\s+/', '', $_POST['currentWord']);

                    if ($auxiliar == $decryption) {
                        return redirect()->to('/win')->send();
                    }
                }
            } else {
                $_POST['errorInfo'] = "Please, enter 1 character or the answer";
            }
        } 
        return view('play', [$_POST]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('play', [$this->initialicer()]);
    }
}

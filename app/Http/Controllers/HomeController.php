<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function initialice()
    {
        $words = array("casa", "perro", "gato", "muerto", "salir", "covid", "salida", "esternon", "esternocleidomastoideo");
        $_POST['word'] = $words[array_rand($words)];
        // Store the cipher method 
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method 
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption 
        $encryption_iv = '1234567891011121';

        // Store the encryption key 
        $encryption_key = "GeeksforGeeks";

        // Use openssl_encrypt() function to encrypt the data 
        $encryption = openssl_encrypt(
            $_POST['word'],
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        return $encryption;
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home',[
            'data' => $this->initialice(),
        ]);
    }
}

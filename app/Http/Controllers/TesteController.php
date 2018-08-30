<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teste');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function jaja()
    {
        
        // $atividade = \App\Atividade::get(); 
        // $banner = \App\Banner::get(); 
        $categoria = \App\Categoria::get(); 
        // $depoimento = \App\Depoimento::get(); 
        // $cliente = \App\Cliente::get(); 
        // $video = \App\Video::get(); 
        // $user = \App\User::get(); 
        // $info = \App\Info::get();

        // return view('teste', compact( 'cliente', 'users', 'timeentries', 'contentpages' ));
        return view('teste', compact( 'categoria' ));
    }

    public function consumirApi()
    {
        $ch = curl_init();

        curl_setopt_array($ch, [

            CURLOPT_URL => 'http://localhost:8001/api/',

            CURLOPT_POST => true,

            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json',
                'x-li-format: json'
            ],

            CURLOPT_POSTFIELDS => json_encode([
                'coment' => 'Check out developer.linkedin.com!',
                'content' => [
                    'title' => 'LinkedIn Developers Resources',
                    'description' => 'Leverage LinkedIn\'s APIs to maximize engagement',
                    'submitted-url' => 'https://developer.linkedin.com',
                    'submitted-image-url' => 'https://example.com/logo.png'
                ],
                'visibility' => [
                    'code' => 'anyone'
                ]
            ]),

            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);

        echo $resultado = curl_exec($ch);
        curl_close($ch);
    }
}

<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PegawaiController extends Controller
{

    public function login(){
        $url = 'https://pkl-api.adsmall.id/api/v1/admin/login';

        $response = Curl::to($url)
        ->withData( array(
            'name' => 'admin' ,
            'password' => 'admin1234'
        ))
        ->asJson()
        ->post();

        $token = $response->token;
        Session::put('tokenku',$token);
    }


    public function index(){
        $url = 'https://pkl-api.adsmall.id/api/v1/pegawai';

        $this->login();
        $tokenku = Session::get('tokenku');

        $response = Curl::to($url)
        ->withHeaders( array( 'Authorization' => 'Bearer '.$tokenku) )
        ->asJson()
        ->get();

        $data = $response->data;
        return view('pegawai.pegawai',['pegawai' => $data]);
    }
}

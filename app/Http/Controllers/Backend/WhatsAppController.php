<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use Session;
use Wppconnect;

class WhatsAppController extends BackendController
{
	protected $url;
    protected $key;
    protected $session;

    /**
     * __construct function
     */
    
        public function __construct(){
            parent::__construct();
        }


        public function index(){

	#Function: Generated Token
	# /api/:session/generate-token
	
        //Session::flush();
        if(!Session::get('token') and !Session::get('session')):
            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/'.$this->session.'/'.$this->key.'/generate-token')->asJson()->post();
            $response = json_decode($response->getBody()->getContents(),true);
            if($response['status'] == 'Success'):
                Session::put('token', $response['token']);
                Session::put('session', $response['session']);
                echo 'criado';
            endif;
        endif;

	#Function: Start Session 
	# /api/:session/start-session
		
        if(Session::get('token') and Session::get('session') and !Session::get('init')):
            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/'.Session::get('session').'/start-session')->withHeaders([
                'Authorization' => 'Bearer '.Session::get('token')
            ])->asJson()->post();
            $response = json_decode($response->getBody()->getContents(),true);
            Session::put('init', true);
            echo ' init';
        endif;
	
    }


    public function send(){
    	   if(Session::get('token') and Session::get('session') and Session::get('init')):
 	       Wppconnect::make($this->url);
       $response = Wppconnect::to('/api/'. Session::get('session').'/send-message')->withBody([
   	'phone' => '5545999595186',
   	'message' => 'Opa, funciona mesmo!'
       ])->withHeaders([
   	'Authorization' => 'Bearer '.Session::get('token')
       ])->asJson()->post();
       $response = json_decode($response->getStatusCode());
       if($response == 201 || $response == 200){
       	echo 'enviado';
       }else {
       	echo 'erro';
       }
   endif;

    }

    public function close(){
    	   if(Session::get('token') and Session::get('session') and Session::get('init')):
		       Wppconnect::make($this->url);
		       $response = Wppconnect::to('/api/'. Session::get('session').'/close-session')->withHeaders([
		   	'Authorization' => 'Bearer '.Session::get('token')
		       ])->asJson()->post();
		       $response = json_decode($response->getBody()->getContents(),true);
		       dd($response);
		   endif;

    }

    public function check(){
    	echo 'a';
    	if(Session::get('token') and Session::get('session')):
            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/'.Session::get('session').'/check-connection-session')->withHeaders([
                'Authorization' => 'Bearer '.Session::get('token')
            ])->asJson()->get();
            $response = json_decode($response->getBody()->getContents(),true);
            echo 'oi';
            dd($response);
        endif;
    }
    public function qr(){
    	if(Session::get('token') and Session::get('session')):
            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/'.Session::get('session').'/qrcode-session')->withHeaders([
                'Authorization' => 'Bearer '.Session::get('token')
            ])->asJson()->get();
            $response = json_decode($response->getBody()->getContents(),true);
            echo 'oi';
            dd($response);
        endif;
    }
}

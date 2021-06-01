<?php
/*
 * Projeto: whatsapp
 * Arquivo: WhatsAppController.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 31/05/2021 9:17:37 am
 * Last Modified:  01/06/2021 4:56:15 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */
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
            $tokenCGN = "LEO-" . date('dmYHi');
            if(\Request::query('CGN') === $tokenCGN){
                if(!Session::get('token') && !Session::get('session')) {
                    Wppconnect::make($this->url);
                    $response = Wppconnect::to('/api/'.$this->session.'/'.$this->key.'/generate-token')->asJson()->post();
                    $response = json_decode($response->getBody()->getContents(),true);
                    echo "Sem token e sessão <br/>";
                    if($response['status'] == 'Success'){
                        Session::put('token', $response['token']);
                        Session::put('session', $response['session']);
                        echo "criado token & session <br/>";
                    }
                }

                if(Session::get('token') && Session::get('session') && !Session::get('init')){
                    Wppconnect::make($this->url);
                    $response = Wppconnect::to('/api/'.Session::get('session').'/start-session')->withHeaders([
                        'Authorization' => 'Bearer '.Session::get('token')
                    ])->asJson()->post();
                    $response = json_decode($response->getBody()->getContents(),true);
                    Session::put('init', true);
                    echo ' sessão iniciada';
                }

                if(Session::get('token') && Session::get('session') && Session::get('init')){
                    Wppconnect::make($this->url);
                    $response = Wppconnect::to('/api/'.Session::get('session').'/start-session')->withHeaders([
                        'Authorization' => 'Bearer '.Session::get('token')
                    ])->asJson()->post();
                    $response = json_decode($response->getBody()->getContents(),true);
                    Session::put('init', true);
                    return response()->json(['message' => 'Inicializando, isso pode levar até 2 minutos']);
                }
            }else {
                abort(404);
            }

    }

    public function close(){
        $tokenCGN = "LEO-" . date('dmYHi');
            if(\Request::query('CGN') === $tokenCGN){
                if(Session::get('token') and Session::get('session') and Session::get('init')):
                    Wppconnect::make($this->url);
                    $response = Wppconnect::to('/api/'. Session::get('session').'/close-session')->withHeaders([
                    'Authorization' => 'Bearer '.Session::get('token')
                    ])->asJson()->post();
                    $response = json_decode($response->getBody()->getContents(),true);
                    dd($response);
                endif;
            }else {
                abort(404);
            }

    }

    public function getStatusConnection(){
    	if(Session::get('token') and Session::get('session')){
            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/'.Session::get('session').'/check-connection-session')->withHeaders([
                'Authorization' => 'Bearer '.Session::get('token')
            ])->asJson()->get();
            $response = json_decode($response->getBody()->getContents(),true);
            return $response;
        }else {
            return json_encode(['status' => false, 'message' => 'Disconnected']);
        }
    }

    public function getStatusBattery(){
        if(Session::get('token') and Session::get('session')){
            try {
                Wppconnect::make($this->url);
                $response = Wppconnect::to('/api/'.Session::get('session').'/get-battery-level')->withHeaders([
                    'Authorization' => 'Bearer '.Session::get('token')
                ])->asJson()->get();
                $response = json_decode($response->getBody()->getContents(),true);
                return $response;
            } catch (\Throwable $th) {
                return json_encode(['status' => false, 'message' => 'Disconnected']);
            }
        }
    }
    public function qr(){
    	if(Session::get('token') and Session::get('session')):
            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/'.Session::get('session').'/status-session')->withHeaders([
                'Authorization' => 'Bearer '.Session::get('token')
            ])->asJson()->get();
            $response = json_decode($response->getBody()->getContents(),true);
            echo 'oi';
            dd($response);
        endif;
    }
}

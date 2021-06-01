<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use App\Models\Group;
use Session;
use Cache;
use Wppconnect;

class GroupController extends BackendController
{
    public function __construct(){
    	parent::__construct();
    }

    public function index(){
        if(Cache::has('all_groups')){
            $records = Cache::get('all_groups');
        }else {
             $records = Group::OrderBy('id', 'desc')->paginate('10');
            // 1 Semana de cache
            Cache::put('all_groups', $records, 604800);
        }
        return view ('backend.group.index', compact('records'));
    }

    public function create(){
        return view('backend.group.create');
    }

    public function store(Request $request){
    	if(Session::get('token') and Session::get('session') and Session::get('init')){
            Wppconnect::make($this->url);
           $response = Wppconnect::to('/api/'. Session::get('session').'/group-info-from-invite-link')->withBody([
                'invitecode' => $request->url
           ])->withHeaders([
            'Authorization' => 'Bearer '.Session::get('token')
           ])->asJson()->post();

            $response = json_decode($response->getBody()->getContents(),true);

           $grupo = Group::firstOrCreate([
	            'name' => $response['response']['subject'],
	            'invite_share' => $request->url,
	            'group_id' => $response['response']['id']['user'],
	            'status' => 'ATIVO'
        	]);

           Cache::forget('all_groups');
           Cache::forget('active_groups');

        return redirect()->route('backend.grupo.index')->with(['message' => 'Grupo ' . $response['response']['subject'] . ' criado com sucesso', 'alert-type'=> 'success']);

        }
    }
}

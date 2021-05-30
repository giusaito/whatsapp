<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Group;
use Session;
use Cache;
use Wppconnect;

class NewsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $records = News::OrderBy('id', 'desc')->paginate('10');
        return view ('backend.news.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Session::get('token') && Session::get('session') && Session::get('init')){
            Wppconnect::make($this->url);

            $news = News::create([
                'url' => $request->url,
                'usr_singup' => bcrypt($request->password),
                'enviado' => 'NAO'
            ]);

            if(Cache::has('all_groups')){
                $groups = Cache::get('all_groups'); 
            }else {
                 $groups = Group::get();
                // 1 Semana de cache
                Cache::put('all_groups', $groups, 604800);
            }

            foreach ($groups as $key => $group) {
               $response = Wppconnect::to('/api/'. Session::get('session').'/send-link-preview')->withBody([
                    'phone' => $group->group_id,
                    'url' => $request->url . '/?utm_source=WhatsApp&utm_medium=Whats&utm_campaign=CGN&utm_term=WhatsApp',
                    'isGroup' => true
               ])->withHeaders([
                'Authorization' => 'Bearer '.Session::get('token')
               ])->asJson()->post();
            
                $response = json_decode($response->getBody()->getContents(),true);
                sleep(2);
            }

         return redirect()->route('backend.noticia.index')->with(['message' => 'Notícia enviada com sucesso', 'alert-type'=> 'success']);

        } else {
            dd(Session::get('token'));
            echo 'erro';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

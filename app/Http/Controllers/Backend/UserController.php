<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: UserController.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 3:13:49 pm
 * Last Modified: Wed Jun 09 2021
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\City;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::orderBy('id', 'desc')->paginate(10);
        return view('backend.user.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::validCity()->get();
        return view('backend.user.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $validatedData = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status_user' => $request->status_user,
        ]);

        $name = explode(" ", $user->name);
        if(isset($name[1])){
          $sobrenome = $name[1];
        }else {
          $sobrenome = "";
        }

        UserProfile::create([
            'user_id' => $user->id,
            'name' => $name[0],
            'last_name' => $sobrenome,
            'cpf' => $request->cpf,
            'whatsapp' => $request->whatsapp,
            'telephone' => $request->telephone,
            'facebook' => $request->facebook,
            'type_pix' => $request->type_pix,
            'pix' => $request->pix
        ]);

        $user->cities()->attach($request->city);

        return redirect()->route('backend.usuario.index')->with(['message' => 'Usuário criado com sucesso', 'alert-type'=> 'success']);
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
        $user = User::with('cities', 'userProfile')->find($id);
        $cities = City::validCity()->get();
        return view('backend.user.edit', compact('user', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
       $user->status_user = $request->status_user;

       $user->update();

        // Profile
       if($user){
        $name = explode(" ", $request->name);
        if(isset($name[1])){
          $sobrenome = $name[1];
        }else {
          $sobrenome = "";
        }
        $user->UserProfile()->update([
            'name' => $name[0],
            'cpf' => $request->cpf,
            'whatsapp' => $request->whatsapp,
            'telephone' => $request->telephone,
            'facebook' => $request->facebook,
            'type_pix' => $request->type_pix,
            'pix' => $request->pix
        ]);

        // Cidade
        $user->cities()->sync($request->city);

        return redirect()->route('backend.usuario.index')->with(['message' => 'Usuário '  . $request->name .' atualizado com sucesso', 'alert-type'=> 'success']);
    }


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

    public function search(Request $request){
        $search = $request->pesquisar;
        $records = User::where(function($query) use($search){
            $searchWildcard = '%' . $search . '%';
            $query->orWhere('name', 'LIKE', $searchWildcard);
        })->orderBy('id', 'desc')->paginate(10);
        return view('backend.user.search', compact('records'));
    }
}

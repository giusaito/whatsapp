<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: edit.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 24/05/2021 10:43:03 am
 * Last Modified:  24/05/2021 4:19:23 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
@extends('layouts.backend')
@section('title','Editar usuário')
@section('subtitle','Editar usuário: ' . $user->name)
@section('content')
<div class="col-12">
  <div class="card card-primary">
    <form method="post" action="{{route('backend.usuario.update', ['usuario' => $user])}}">
      @csrf
      @method('put')
      <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="name">Nome completo *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome completo" value="{{$user->name}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cpf">CPF <small>Apenas números</small> *</label>
                <input type="text" class="form-control" id="cpf" name="cpf" minlength="11" maxlength="11" placeholder="Informe apenas números" value="{{$user->userProfile->cpf}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="whatsapp">WhatsApp</label>
              <input type="number" class="form-control" id="whatsapp" name="whatsapp" placeholder="Digite o WhatsApp" value="{{$user->userProfile->whatsapp}}">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="telephone">Telefone *</label>
              <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Ex: 45999595186" value="{{$user->userProfile->telephone}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="email">E-mail *</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" value="{{$user->email}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Url do Facebook" value="{{$user->userProfile->facebook}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="type_pix">Tipo pix</label>
              <select class="form-control" name="type_pix">
                <option value="">Selecione</option>
                <option value="cpf" {{$user->userProfile->type_pix == 'cpf' ? 'selected' : ''}}>CPF</option>
                <option value="celular" {{$user->userProfile->type_pix == 'celular' ? 'selected' : ''}}>Celular</option>
                <option value="email" {{$user->userProfile->type_pix == 'email' ? 'selected' : ''}}>E-mail</option>
                <option value="aleatoria" {{$user->userProfile->type_pix == 'aleatoria' ? 'selected' : ''}}>Chave aleatória</option>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="pix">Pix</label>
              <input type="text" class="form-control" id="pix" name="pix" placeholder="Insira a chave Pix" value="{{$user->userProfile->pix}}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="city">Cidade</label>
              <select class="form-control" name="city" required>
                <option value="">Selecione a cidade</option>
                @foreach($cities as $city)
                <option value="{{$city->id}}" {{ ($city->id == $user->cities[0]->id ? "selected":"") }}>{{$city->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="status_user">Status do usuário</label>
              <select class="form-control" name="status_user">
                <option value="1" {{$user->status_user == '1' ? 'selected' : ''}}>Ativo</option>
                <option value="0" {{$user->status_user == '0' ? 'selected' : ''}}>Banido</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="password">Senha*</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Insira a senha">
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Atualizar</button>
      </div>
    </form>
  </div>
</div>
@endsection

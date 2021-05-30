<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: create.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 3:43:31 pm
 * Last Modified:  24/05/2021 3:23:39 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
@extends('layouts.backend')
@section('title','Cadastrar usuário')
@section('subtitle','Cadastrar usuário')
@section('content')
<div class="col-12">
  <div class="card card-primary">
    <form method="post" action="{{route('backend.usuario.store')}}">
      @csrf
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
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome completo" value="{{ old('name')}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cpf">CPF <small>Apenas números</small> *</label>
              <input type="text" class="form-control" id="cpf" name="cpf" minlength="11" maxlength="11" placeholder="Informe apenas números" value="{{ old('cpf')}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="whatsapp">WhatsApp</label>
              <input type="number" class="form-control" id="whatsapp" name="whatsapp" placeholder="Digite o WhatsApp" value="{{ old('whatsapp')}}">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="telephone">Telefone *</label>
              <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Ex: 45999595186" value="{{ old('telephone')}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="email">E-mail *</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" value="{{ old('email')}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Url do Facebook" value="{{ old('facebook')}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="type_pix">Tipo pix</label>
              <select class="form-control" name="type_pix">
                <option value="">Selecione</option>
                <option value="cpf">CPF</option>
                <option value="celular">Celular</option>
                <option value="email">E-mail</option>
                <option value="aleatoria">Chave aleatória</option>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="pix">Pix</label>
              <input type="text" class="form-control" id="pix" name="pix" placeholder="Insira a chave Pix" value="{{ old('pix')}}">
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
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="status_user">Status do usuário</label>
              <select class="form-control" name="status_user">
                <option value="1">Ativo</option>
                <option value="0">Banido</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="password">Senha*</label>
              <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Insira a senha" required>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Adicionar</button>
      </div>
    </form>
  </div>
</div>
@endsection

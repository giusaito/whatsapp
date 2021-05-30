<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: create.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 3:43:31 pm
 * Last Modified:  24/05/2021 4:31:18 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
@extends('layouts.backend')
@section('title','Adicionar Grupo')
@section('subtitle','Adicionar Grupo')
@section('content')
<div class="col-12">
  <div class="card card-primary">
    <form method="post" action="{{route('backend.grupo.store')}}">
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
          <div class="col-12">
            <div class="form-group">
              <label for="url">Código de convite do grupo *</label>
              <input type="url" class="form-control" id="url" name="url" placeholder="Insira do link grupo" value="{{old('url')}}" required>
            </div>
          </div>
        </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Adicionar Grupo</button>
      </div>
    </form>
    <small>Ao clicar em adicionar grupo, será enviado uma requisição ao WhatsApp afim de obter o código do grupo, isso pode demorar alguns segundos..</small>
  </div>
</div>
@endsection

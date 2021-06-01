<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: create.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 3:43:31 pm
 * Last Modified:  31/05/2021 5:27:08 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
@extends('layouts.backend')
@section('title','Adicionar Notícia')
@section('subtitle','Compartilhar Notícia')
@section('content')
<div class="col-12">
  <div class="card card-primary">
    <form method="post" action="{{route('backend.noticia.store')}}">
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
              <label for="url">URL *</label>
              <input type="url" class="form-control" id="url" name="url" placeholder="Insira a URL da notícia" value="{{old('url')}}"  title="A url inserida não corresponde a CGN.INF.BR" required>
            </div>
          </div>
        </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Compartilhar no WhatsApp</button>
      </div>
    </form>
    <h6 class="mt-3">Ao clicar em compartilhar no WhatsApp, o sistema irá compartilhar essa url em todos os grupos da CGN, isso pode demorar um pouco, não feche está guia</h6>
  </div>
</div>
@endsection

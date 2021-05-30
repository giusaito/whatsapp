<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: edit.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 24/05/2021 10:43:03 am
 * Last Modified:  24/05/2021 4:30:41 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
@extends('layouts.backend')
@section('title','Editar cidade')
@section('subtitle','Editar cidade: ' . $record->name)
@section('content')
<div class="col-12">
  <div class="card card-primary">
    <form method="post" action="{{route('backend.cidade.update', ['cidade' => $record])}}">
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
              <label for="name">Nome *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da cidade" value="{{$record->name}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="">Selecione</option>
                    <option value="1" {{$record->status == '1' ? 'selected' : ''}}>Ativo</option>
                    <option value="0" {{$record->status == '0' ? 'selected' : ''}}>Desativada</option>
                </select>
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

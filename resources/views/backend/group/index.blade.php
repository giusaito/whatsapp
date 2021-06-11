<?php
/*
 * Projeto: whatsapp
 * Arquivo: index.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 31/05/2021 9:17:48 am
 * Last Modified: Wed Jun 09 2021
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
@extends('layouts.backend')
@section('title','Lista de Grupos')
@section('subtitle','Lista de Grupos')

@section('content')
<div class="col-12">
    <a href="{{route('backend.grupo.create')}}" class="btn btn-success m-2">Adicionar</a>
    <div class="card">
        <div class="card-header">
        <form action="{{route('backend.grupo.search')}}" method="GET">
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                <input type="text" name="pesquisar" class="form-control right floa-right" placeholder="Digite um termo para buscar" required="required">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
        </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>ID Grupo</th>
                <th>Url</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->name}}</td>
                    <td>{{$record->group_id}}</td>
                    <td>{{$record->invite_share}}</td>
                    <td>{{$record->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
    {{$records->links('pagination::bootstrap-4')}}
@endsection

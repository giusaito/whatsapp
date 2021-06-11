<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: search.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 24/05/2021 10:43:09 am
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
@section('title','Pesquisa de notícias')
@section('subtitle','Resultado para: ' . Request::input('pesquisar'))

@section('content')
<div class="col-12">
    <a href="{{route('backend.noticia.index')}}" class="btn btn-info m-2">< Voltar</a>
    <a href="{{route('backend.noticia.create')}}" class="btn btn-success m-2">Compartilhar Notícia</a>
    <div class="card">
        <div class="card-header">
        <form action="{{route('backend.noticia.search')}}" method="GET">
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                <input type="text" name="pesquisar" class="form-control right floa-right" placeholder="Digite um termo para buscar" value="{{Request::input('pesquisar')}}" required="required">
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
                <th>Url</th>
                <th>Enviado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr class="{{$record->status  == '0'  ? 'table-danger' : ''}}">
                    <td>{{$record->id}}</td>
                    <td><a href="{{$record->url}}" target="_blank">{{$record->url}}</a></td>
                    <td>{{$record->enviado == 'NAO' ? 'NAO' : 'SIM'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($records->count() < 1)
            <h4 class="text-center mt-5 mb-5">
                Não encontramos resultados para a pesquisa <strong>{{Request::input('pesquisar')}}</strong> por favor, revise o termo pesquisado e tente novamente
            </h4>
        @endif
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
    {{ $records->withQueryString()->onEachSide(3)->links('pagination::bootstrap-4') }}
@endsection

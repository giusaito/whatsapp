@extends('layouts.backend')
@section('title','Lista de Notícias')
@section('subtitle','Lista de Notícias')

@section('content')
<div class="col-12">
    <a href="{{route('backend.noticia.create')}}" class="btn btn-success m-2">Compartilhar notícia</a>
    <div class="card">
        <div class="card-header">
        <form action="{{route('backend.noticia.search')}}" method="GET">
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
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
    {{$records->links('pagination::bootstrap-4')}}
@endsection

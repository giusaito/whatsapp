<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: index.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 10:49:31 am
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
@section('title','Home')
@section('content')


<div class="col-lg-6 col-6">
   <div class="small-box bg-info">
      <div class="inner">
         <h3>{{$news}}</h3>
         <p>Notícias Compartilhadas</p>
      </div>
      <div class="icon">
        <i class="fas fa-newspaper"></i>
      </div>
      <a href="{{route('backend.noticia.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
   </div>
</div>

<div class="col-lg-6 col-6">
   <div class="small-box bg-warning">
      <div class="inner">
         <h3>{{$groups}}</h3>
         <p>Grupos</p>
      </div>
      <div class="icon">
         <i class="fab fa-whatsapp"></i>
      </div>
      <a href="{{route('backend.grupo.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
   </div>
</div>
@endsection

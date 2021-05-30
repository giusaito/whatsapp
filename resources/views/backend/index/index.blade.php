<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: index.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 10:49:31 am
 * Last Modified:  19/05/2021 3:52:00 pm
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


<div class="col-lg-3 col-6">
   <div class="small-box bg-info">
      <div class="inner">
         <h3>7</h3>
         <p>Ocorrências em aberto</p>
      </div>
      <div class="icon">
         <i class="fas fa-ambulance"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
   </div>
</div>

<div class="col-lg-3 col-6">
   <div class="small-box bg-success">
      <div class="inner">
         <h3>53</h3>
         <p>Usuários registrados</p>
      </div>
      <div class="icon">
         <i class="fas fa-users"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
   </div>
</div>

<div class="col-lg-3 col-6">
   <div class="small-box bg-warning">
      <div class="inner">
         <h3>44</h3>
         <p>Total de ocorrências</p>
      </div>
      <div class="icon">
         <i class="fas fa-sort-numeric-up-alt"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
   </div>
</div>

<div class="col-lg-3 col-6">
   <div class="small-box bg-danger">
      <div class="inner">
         <h3>65</h3>
         <p>Usuários banidos</p>
      </div>
      <div class="icon">
         <i class="fas fa-ban"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
   </div>
</div>


@endsection
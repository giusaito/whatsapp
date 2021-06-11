@extends('layouts.backend')
@section('title','Login no Whatsapp')
@section('subtitle','Login no Whatsapp')

@section('content')
<div class="col-12">
    <login-whats qrcode-or-status="{{json_encode($response)}}"></login-whats>
</div>
@endsection

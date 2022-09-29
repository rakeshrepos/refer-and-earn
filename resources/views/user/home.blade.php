@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <get-link-button user_id="{{Auth::user()->id}}"></get-link-button>
            <get-users user_id="{{Auth::user()->id}}"/>
        </div>
    </div>
</div>
@endsection
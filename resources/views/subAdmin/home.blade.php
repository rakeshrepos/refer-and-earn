@extends('layouts.subAdmin')

@section('content')
<div class="w-full mt-10 ml-[17rem]">
    <p class="text-xl font-bold">Welcome, {{Auth::user()->name}}</p>
    <sub-admin-get-link-button user_id="{{Auth::user()->id}}"></get-link-button>    
</div>
@endsection

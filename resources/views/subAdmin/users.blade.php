@extends('layouts.subAdmin')

@section('content')
<div class="w-full mt-10 ml-[15rem]">
    <p class="text-xl font-bold">Welcome, {{Auth::user()->name}}</p>
    <sub-admin-get-users user_id="{{Auth::user()->id}}"></sub-admin-get-users>    
</div>
@endsection

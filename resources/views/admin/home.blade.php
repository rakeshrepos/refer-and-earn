@extends('layouts.admin')

@section('content')
<div class="mt-10 ml-[17rem]">
    <p class="text-xl font-bold">Welcome, {{Auth::user()->name}}</p>
</div>
@endsection

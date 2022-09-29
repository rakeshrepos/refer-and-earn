@extends('layouts.admin')
<style type="text/css">
  td {
    padding: 5px 15px;
  }
  table {
        border-collapse: collapse;
        border-spacing: 10px 20px;
    }
</style>
@section('content')
<div class="mt-10 ml-[17rem]">
    <p class="text-xl font-bold">Users</p>
    <table class="w-full" width="100%">
        <tr>
            <!-- <th><input type="checkbox"></th> -->
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
        <tr class="bg-white hover:shadow-xl border-2 border-black">
            <!-- <td><input type="checkbox"></td> -->
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

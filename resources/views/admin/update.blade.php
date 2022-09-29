@extends('layouts.admin')

@section('content')
<div class="flex flex-col flex-1 items-center mt-10 ml-[15rem]">
    <p class="font-bold">Update Details</p>
    @if($status)
        <div class="">
            {{ $status }}
        </div>
    @endif
    <form action="{{ route('adminUpdateDetails') }}" method="POST" class="flex flex-col gap-3 mt-5">
        @csrf
        <p>Name*</p>
        <input type="text" name="name" value="{{$user->name}}" placeholder="Your email" class="border-[2px] border-gray-300 px-[1rem] h-[2.5rem] w-[18rem] rounded-full" required autofocus>
        <p>Email*</p>
        <input type="email" name="email" value="{{$user->email}}" placeholder="Your email" class="border-[2px] border-gray-300 px-[1rem] h-[2.5rem] w-[18rem] rounded-full" required autofocus>
        <p>Password*</p>
        <input type="password" name="password" placeholder="Your password" class="border-[2px] border-gray-300 px-[1rem] h-[2.5rem] w-[18rem] rounded-full" required>
        <input type="submit" value="Update" class="cursor-pointer bg-green-400 text-white rounded-full h-[2.5rem] mt-5">
    </form>
</div>
@endsection

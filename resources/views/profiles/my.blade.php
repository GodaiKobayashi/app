@extends('layouts.app')

@section('content')
           <a href="{{ route('profile.edit',$user->profile->id) }}">更新</a>
           
                <h2>Display Name</h2>
               @if(collect([$user->profile])->isEmpty())
                <p>No image</p>
                @else
                <p>{{ $user->profile->name }}</p>
                @endif
            </div>
            
           
 @endsection
@extends('layouts.header')

@section('content')
@can('home')
    @else
    Not Permision
    @endcan
@endsection

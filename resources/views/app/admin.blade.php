@extends('app.layouts.app')

@section('title', $title)

@section('content')

{{-- Welcome to page admin --}}

@include('app.layouts._partials.sidebar')

@include('app.layouts._partials.main_content')



@endsection
@extends('layouts.app')

@section('content')
    <customer-edit-component :customer="{{ $data }}"></customer-edit-component>
@endsection
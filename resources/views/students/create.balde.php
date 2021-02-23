@extends('students.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Record</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Opps!</strong> Input Error</br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
    </ul>
</div>
@endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf 

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>StudentName:</strong>
            <input type="text" name="studentname" class="form-control" placeholder="studentname">
            
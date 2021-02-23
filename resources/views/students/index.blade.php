@extends('students.layout')

@section('content')
<div class="pull-left">
    <h2>Student Record</h2>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('students.create') }}">Add New Record</a>
        </div>

    </div>
</div>

@if ($message = Session::get('success'))
    <div class ="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>

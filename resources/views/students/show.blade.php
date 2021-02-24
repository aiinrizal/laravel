@extends('students.layout')

@section('content')
<div class="card text-center">
  <div class="card-header">
    <h2>Student Record</h2>
</div>

<table class="table table-striped table-bordered mt-5">
  <thead>
    <tr>
      <th scope="col text-center"colspan="2">Student's Info</th>
    </tr>
    <th><a href="{{ url('students/word-export/' . $student->id) }}" class="btn btn-sm btn-primary">Export to Word</th>

  </thead>
  <tbody>
    <tr>
      <th scope="row">ID</th>
      <td>{{ $student -> id }}</td>
    </tr>
    <tr>
      <th scope="row">Name</th>
      <td>{{ $student -> name }}</td>
    </tr>
    <tr>
      <th scope="row">Course</th>
      <td>{{ $student -> course }}</td>
    </tr>
    <tr>
      <th scope="row">Fee</th>
      <td>{{ $student -> fee }}</td>
    </tr>
  </tbody> 
   
</table>

</div>



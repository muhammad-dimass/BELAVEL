@extends('templates.default')

@php
    $title = 'Data Student';
    $preTitle = 'All Data';
@endphp

@push('page-action')
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Students</a>
@endpush

@section('content')

<div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Addres</th>
                          <th>Phone</th>
                          <th>Class</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($students as $student)
                        <tr>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->addres}}</td>
                          <td>{{ $student->phone_number }}</td>
                          <td>{{ $student->class }}</td>
                          <td><a href="{{ route('students.edit', $student->id) }}"> edit </a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              
@endsection
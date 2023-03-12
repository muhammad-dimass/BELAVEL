@extends('templates.default')

@php
    $title = 'Data Class Student';
    $preTitle = 'All Data';
@endphp

@push('page-action')
    <a href="{{ route('studentclass.create') }}" class="btn btn-primary">Add Class</a>
@endpush

@section('content')

<div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Slug</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($classes as $class)
                        <tr>
                          <td>{{ $class->name }}</td>
                          <td>{{ $class->slug}}</td>
                          <td><a href="{{ route('studentclass.edit', $class->id) }}" class="btn btn-warning btn-sm"> edit </a>
                          <form action="{{ route('studentclass.destroy', $class->id ) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              
@endsection
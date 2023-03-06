@extends('templates.default')

@php
    $title = 'Data Student';
    $preTitle = 'Edit Data Students';
@endphp

@section('content')

<div class="card">
    <div class="card-body">
    <form action="{{ route('students.update', $student->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Input name" value="{{$student->name}}">
        </div>

        <div class="mb-3">
          <label class="form-label">Addres</label>
          <input type="text" class="form-control" name="addres" placeholder="Input addres" value="{{ $student->addres }}">
        </div>

        <div class="mb-3">
          <label class="form-label">phone number</label>
          <input type="text" class="form-control" name="phone_number" placeholder="Input phone number" value="{{ $student->phone_number }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Class</label>
          <input type="text" class="form-control" name="class" placeholder="Input class" value="{{ $student->class }}">
        </div>

        <div class="mb-3">
            <input type="submit" value="Store" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>                  
              
@endsection
@extends('templates.default')

@php
    $title = 'Data Student';
    $preTitle = 'Add Data Student';
@endphp

@section('content')

<div class="card">
    <div class="card-body">
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Input name">
        </div>

        <div class="mb-3">
          <label class="form-label">Addres</label>
          <input type="text" class="form-control" name="addres" placeholder="Input addres">
        </div>

        <div class="mb-3">
          <label class="form-label">phone number</label>
          <input type="text" class="form-control" name="phone_number" placeholder="Input phone number">
        </div>

        <div class="mb-3">
          <label class="form-label">Class</label>
          <input type="text" class="form-control" name="class" placeholder="Input class">
        </div>

        <div class="mb-3">
            <input type="submit" value="Store" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>                  
              
@endsection
@extends('templates.default')

@php
    $title = 'Data Student';
    $preTitle = 'Add Data Student';
@endphp

@section('content')

<div class="card">
    <div class="card-body">
    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control @error('name')
            is-invalid
            @enderror" name="name" placeholder="Input name" value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Addres</label>
          <input type="text" class="form-control  @error('addres')
            is-invalid
            @enderror" name="addres" placeholder="Input addres" value="{{ old('addres') }}">
            @error('addres')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">phone number</label>
          <input type="text" class="form-control  @error('phone_number')
            is-invalid
            @enderror" name="phone_number" placeholder="Input phone number" value="{{ old('phone_number') }}">
            @error('phone_number')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Class</label>
        <select name="student_class_id" id="" class="form-control">
            @foreach ($classes as $class)
            <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
          @error('class')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Photo</label>
          <input type="file" class="form-control @error('photo')
            is-invalid
            @enderror" name="photo" placeholder="Input photo" value="{{ old('photo') }}">
            @error('photo')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <input type="submit" value="Store" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>                  
              
@endsection
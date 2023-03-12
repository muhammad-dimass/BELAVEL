@extends('templates.default')

@php
    $title = 'Data Class Student';
    $preTitle = 'Edit Data Class Students';
@endphp

@section('content')

<div class="card">
    <div class="card-body">
    <form action="{{ route('studentclass.update', $class->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control  @error('name')
            is-invalid
            @enderror" name="name" placeholder="Input name" value="{{old('name') ?? $class->name}}">
            @error('name')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Slug</label>
          <input type="text" class="form-control  @error('slug')
            is-invalid
            @enderror" name="slug" placeholder="Input slug" value="{{ old('slug') ?? $class->slug }}">
            @error('slug')
            <span class="invalid-feedback" >{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>                  
              
@endsection
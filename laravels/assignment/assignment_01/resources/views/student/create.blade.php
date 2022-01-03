@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      @if($errors->any())
      <div class="alert alert-danger">
        <ol>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ol>
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h4>Add Student with IMAGE
            <a href="{{ url('students') }}" class="btn btn-danger float-end">BACK</a>
          </h4>
        </div>
        <div class="card-body">

          <form action="{{ url('add-student') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
              <label for="name">Student Name</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="email">Student Email</label>
              <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label>Major</label>
              <select class="form-select" name="major_id">
                @foreach($majors as $major)
                <option value="{{$major['id'] }}">
                  {{$major['name'] }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="">Student Course</label>
              <input type="text" name="course" value="{{ old('course') }}" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="">Student Profile Image</label>
              <input type="file" name="profile_image" class="form-control">
            </div>
            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">Save Student</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
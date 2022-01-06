@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Student with IMAGE
            <a href="{{ url('students') }}" class="btn btn-danger float-end">BACK</a>
          </h4>
        </div>
        <div class="card-body">

          <form action="{{ url('update-student/'.$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
              <label for="">Student Name</label>
              <input type="text" name="name" value="{{$student->name}}" class="form-control @error('name') is-invalid @enderror">
              @error('name')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Student Email</label>
              <input type="text" name="email" value="{{$student->email}}" class="form-control @error('email') is-invalid @enderror">
              @error('email')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label>Major</label>
              <select class="form-select" name="major_id">
                @foreach($majors as $major)
                <option value="{{$major['id'] }}">
                  {{$major['majorname'] }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="">Student Course</label>
              <input type="text" name="course" value="{{$student->course}}" class="form-control @error('course') is-invalid @enderror">
              @error('course')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Student Profile Image</label>
              <input type="file" name="profile_image" class="form-control">
              <img src="{{ asset('uploads/students/'.$student->profile_image) }}" width="70px" height="70px" alt="Image">
            </div>
            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">Update Student</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
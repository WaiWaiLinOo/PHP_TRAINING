@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card-header">
          <h4>Laravel 8 IMAGE CRUD
            <a href="{{ url('add-student') }}" class="btn btn-primary float-end">Add Student</a>
          </h4>
          <a class="btn btn-info mt-4" href="/export-pdf"> Export PDF</a>
          <a class="btn btn-success mt-4" href="/export-excel"> Export EXCEL</a>
          <a class="btn btn-warning mt-4" href="/export-csv"> Export CSV</a>
          <!--import -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            import Data
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Exel file</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/import-excel" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="file" name="file" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
              </form>
            </div>
          </div>
          <!--import -->
          <!--search -->
          <form action="/" method="GET">
            @csrf
            <br>
            <div class="container">
              <div class="row">
                <div class="container-fluid">
                  <div class="form-group row">
                    <label for="name" class="col-form-label col-sm-1">Name</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control input-sm" id="name" name="name" >
                    </div>
                    <label for="date" class="col-form-label col-sm-1">From</label>
                    <div class="col-sm-2">
                      <input type="date" class="form-control input-sm" id="from" name="fromDate">
                    </div>
                    <label for="date" class="col-form-label col-sm-1">To</label>
                    <div class="col-sm-2">
                      <input type="date" class="form-control input-sm" id="to" name="toDate">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-outline-success" name="search" title="Search">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!--search -->
        </div>
        <div class="card-body">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Major</th>
                <th>Course</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($student as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{$item->majorname}}</td>
                <td>{{ $item->course }}</td>
                <td>
                  <img src="{{ asset('uploads/students/'.$item->profile_image) }}" width="70px" height="70px" alt="Image">
                </td>
                <td>
                  <a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                  {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                  <form action="{{ url('delete-student/'.$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
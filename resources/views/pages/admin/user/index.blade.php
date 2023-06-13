@extends('layouts.parent')

@section('content')
    
<div class="container">

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
     {!! \Session::get('success') !!}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  @elseif (session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
      {!! \Session::get('error') !!}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">List User</h5>
{{-- 
          <div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.category.create') }}" class="btn btn-primary">Create</a>
          </div> --}}

          <!-- Table with stripped rows -->
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($user as $row)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->name }}</td>
                <td>@if ($row->roles == 'ADMIN')
                  <span class="badge bg-danger">{{ $row->roles }}</span> 
                @else
                <span class="badge bg-primary">{{ $row->roles }}</span> 
                @endif</td>
               <td>
                <a href="{{ route('dashboard.user.edit', $row->id) }}" class="btn btn-warning">
                  <i class="bi bi-pencil"></i>
                  edit
                </a>
                <form action="{{ route('dashboard.user.destroy', $row->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger m-1" onclick="return confirm('are you sure?')">
                      Delete
                  </button>

              </form>
               </td>
              </tr>
              @empty
                  <tr>
                    <td colspan="4" class="text-center"> Data Kosong</td>
                  </tr>
              @endforelse
             
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
</div>

@endsection
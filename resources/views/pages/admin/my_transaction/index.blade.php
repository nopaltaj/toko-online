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
          <h5 class="card-title">My Transaction</h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name Account</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ( $myTransaction as $row )
              <tr>
                <td >{{ $loop->iteration }}</td>
                <td >{{ $row->user->name }}</td>
                <td >{{ $row->name }}</td>
                <td >{{ $row->email }}</td>
                <td >{{ number_format($row->total_price) }}</td>
                <td >
                  @if ($row->status == 'PENDING')
                  <span class="badge bg-warning">PENDING</span>
                  @elseif ($row->status == 'SUCCESS')
                  <span class="badge bg-success">SUCCESS</span>
                  @elseif ($row->status == 'FAILED')
                  <span class="badge bg-danger">FAILED</span>
                  @elseif ($row->status == 'SHIPPING')
                  <span class="badge bg-info">SHIPPING</span>
                  @elseif ($row->status == 'SHIPPED')
                  <span class="badge bg-primary">SHIPPED</span>
                  @endif
                  
                 
                </td>
                <td >
                  <a href="{{ route('my-transaction.show', $row->id) }}" class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                    Show
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="9" class="text-center"> Data Kosong</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          
        </div>
</div>

@endsection
@extends('layouts.parent')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Transaction #{{ $transaction->id }} &raquo; {{ $transaction->user->name }}</h5>
       
        <table class="table table-striped table-bordered">
              <tr>
                <th scope="col">Name</th>
                <td scope="col">{{ $transaction->name }}</td>
              </tr>
              <tr>
                <th scope="col">Email</th>
                <td scope="col">{{ $transaction->email }}</td>
              </tr>
              <tr>
                <th scope="col">phone</th>
                <td scope="col">{{ $transaction->phone }}</td>
              </tr>
              <tr>
                <th scope="col">address</th>
                <td scope="col">{{ $transaction->address }}</td>
              </tr>
              <tr>
                <th scope="col">courir</th>
                <td scope="col">{{ $transaction->courier }}</td>
              </tr>
              <tr>
                <th scope="col">total price</th>
                <td scope="col">{{ $transaction->total_price }}</td>
              </tr>
              <tr>
                <th scope="col">payment</th>
                <td scope="col">{{ $transaction->payment }}</td>
              </tr>
              <tr>
                <th scope="col">payment url</th>
                <td scope="col"><a href="http://{{ $transaction->payment_url }}">{{ $transaction->payment_url }}</a></td>
              </tr>
              <tr>
                <th scope="col">status</th>
                <td scope="col"> @if ($transaction->status == 'PENDING')
                  <span class="badge bg-warning">PENDING</span>
                  @elseif ($transaction->status == 'SUCCESS')
                  <span class="badge bg-success">SUCCESS</span>
                  @elseif ($transaction->status == 'FAILED')
                  <span class="badge bg-danger">FAILED</span>
                  @elseif ($transaction->status == 'SHIPPING')
                  <span class="badge bg-info">SHIPPING</span>
                  @elseif ($transaction->status == 'SHIPPED')
                  <span class="badge bg-primary">SHIPPED</span>
                  @endif
                  
                 </td>
              </tr>
              <tr>
                <th scope="col">created_at</th>
                <td scope="col">{{ $transaction->created_at }}</td>
              </tr>
              <tr>
                <th scope="col">updated_at</th>
                <td scope="col">{{ $transaction->updated_at }}</td>
              </tr>
        </table>    
          
        <div class="text-end">
          <a href="{{ Route('dashboard.product.index') }}">
            <button type="submit" class="btn btn-primary mt-2">Back</button></a>
        </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Transaction Item</h5>
       
        <table class="table table-striped ">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name Product</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($transaction->transactionItem as $row)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                <td scope="col">{{ $row->product->name }}</td>
                <td scope="col">{{ number_format($row->product->price) }}</td>
                    </tr>
                @endforeach
            </tbody>
            
    </div>
    
</div>


<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
</script>


    
@endsection
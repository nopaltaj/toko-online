@extends('layouts.parent')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">My Transaction</h5>
       
        <table class="table table-striped table-bordered">
              <tr>
                <th scope="col">Name</th>
                <td scope="col">{{ $myTransaction->name }}</td>
              </tr>
              <tr>
                <th scope="col">Email</th>
                <td scope="col">{{ $myTransaction->email }}</td>
              </tr>
              <tr>
                <th scope="col">phone</th>
                <td scope="col">{{ $myTransaction->phone }}</td>
              </tr>
              <tr>
                <th scope="col">address</th>
                <td scope="col">{{ $myTransaction->address }}</td>
              </tr>
              <tr>
                <th scope="col">courir</th>
                <td scope="col">{{ $myTransaction->courier }}</td>
              </tr>
              <tr>
                <th scope="col">total price</th>
                <td scope="col">{{ $myTransaction->total_price }}</td>
              </tr>
              <tr>
                <th scope="col">payment</th>
                <td scope="col">{{ $myTransaction->payment }}</td>
              </tr>
              <tr>
                <th scope="col">payment url</th>
                <td scope="col"><a href="http://{{ $myTransaction->payment_url }}">{{ $myTransaction->payment_url }}</a></td>
              </tr>
              <tr>
                <th scope="col">status</th>
                <td scope="col"> @if ($myTransaction->status == 'PENDING')
                  <span class="badge bg-warning">PENDING</span>
                  @elseif ($myTransaction->status == 'SUCCESS')
                  <span class="badge bg-success">SUCCESS</span>
                  @elseif ($myTransaction->status == 'FAILED')
                  <span class="badge bg-danger">FAILED</span>
                  @elseif ($myTransaction->status == 'SHIPPING')
                  <span class="badge bg-info">SHIPPING</span>
                  @elseif ($myTransaction->status == 'SHIPPED')
                  <span class="badge bg-primary">SHIPPED</span>
                  @endif
                  
                 </td>
              </tr>
              <tr>
                <th scope="col">created_at</th>
                <td scope="col">{{ $myTransaction->created_at }}</td>
              </tr>
              <tr>
                <th scope="col">updated_at</th>
                <td scope="col">{{ $myTransaction->updated_at }}</td>
              </tr>
        </table>    
          
        <div class="text-end">
          <a href="{{ Route('my-transaction.index') }}">
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
                @foreach ($myTransaction->transactionItem as $row)
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
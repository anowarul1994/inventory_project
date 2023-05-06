@extends('backend.layouts.master')

@section('page_title', 'Customer Details')
@section('content')

     <div class="container-xxl flex-grow-1 container-p-y text-black">
          <div class="row">
               <div class="col-md-12 mb-4 order-0">
                    <div class="card">
                         <div class="card-header">
                              <div class="d-flex justify-content-between pb-0">
                                   <h3>Customer Details</h3>
                                  
                              </div>
                         </div>
                         <div class="card-body">
                              <table class="table table-hover table-bordered">
                                  
                                        <tr>
                                             <th>ID</th>
                                             <td>{{ $customer->id }}</td>
                                        </tr>
                                        <tr>
                                             <th>Full Name</th>
                                             <td>{{ $customer->name }}</td>
                                        </tr>
                                        <tr>
                                             <th>Email</th>
                                             <td>{{ $customer->email }}</td>
                                        </tr>
                                        <tr>
                                             <th> Photo</th>
                                             <td><img width="75px" src="{{ asset('image/customers/'.$customer->image) }}" alt=""></td>
                                        </tr>
                                        <tr>
                                             <th> Phone </th>
                                             <td>{{ $customer->phone }}</td>
                                        </tr>
                                        <tr>
                                             <th> address </th>
                                             <td>{{ $customer->address }}</td>
                                        </tr>
                                        <tr>
                                             <th> Shop Name </th>
                                             <td>{{ $customer->shop_name }}</td>
                                        </tr>
                                        <tr>
                                             <th> Account Name</th>
                                             <td>{{ $customer->account_name }}</td>
                                        </tr>
                                        <tr>
                                             <th> Account Number </th>
                                             <td>{{ $customer->account_number }}</td>
                                        </tr>
                                        <tr>
                                             <th> Bank Name </th>
                                             <td>{{ $customer->bank_name }}</td>
                                        </tr>
                                        <tr>
                                             <th> Bank Branch </th>
                                             <td>{{ $customer->bank_branch }}</td>
                                        </tr>
                                   
                                        <tr>
                                             <th> City </th>
                                             <td>{{ $customer->city }}</td>
                                        </tr>
                                        <tr>
                                             <th> Created_at </th>
                                             <td>{{ $customer->created_at->toDayDateTimeString() }}</td>
                                        </tr>
                                        <tr>
                                             <th> Update_at </th>
                                             <td>{{ $customer->updated_at == $customer->created_at ? "Not Update" : $customer->updated_at->toDayDateTimeString() }}</td>
                                        </tr>                                 

                                  
                              </table>

                              <span><a class="btn btn-dark btn-sm mt-3 " href="{{ route('customers.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Back</a></span>
                         </div>

                    </div>
               </div>
          </div>
     </div>
 
  
     @if (Session::has('msg'))
     @push('js')

     
         <script>
             Swal.fire({
             position: 'top-end',
             icon: '<?php echo session('cls')?>',
             toast: true,
             title: '<?php echo session('msg')?>',
             showConfirmButton: false,
             timer: 3000
             })
         </script>

     @endpush

 @endif

@endsection
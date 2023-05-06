@extends('backend.layouts.master')

@section('page_title', 'Employee Details')
@section('content')

     <div class="container-xxl flex-grow-1 container-p-y text-black">
          <div class="row">
               <div class="col-md-12 mb-4 order-0">
                    <div class="card">
                         <div class="card-header">
                              <div class="d-flex justify-content-between pb-0">
                                   <h3>Employee Details</h3>
                                  
                              </div>
                         </div>
                         <div class="card-body">
                              <table class="table table-hover table-bordered">
                                  
                                        <tr>
                                             <th>ID</th>
                                             <td>{{ $employee->id }}</td>
                                        </tr>
                                        <tr>
                                             <th>Full Name</th>
                                             <td>{{ $employee->name }}</td>
                                        </tr>
                                        <tr>
                                             <th>Email</th>
                                             <td>{{ $employee->email }}</td>
                                        </tr>
                                        <tr>
                                             <th> Photo</th>
                                             <td><img width="75px" src="{{ asset('image/employee/'.$employee->image) }}" alt=""></td>
                                        </tr>
                                        <tr>
                                             <th> Phone </th>
                                             <td>{{ $employee->phone }}</td>
                                        </tr>
                                        <tr>
                                             <th> address </th>
                                             <td>{{ $employee->address }}</td>
                                        </tr>
                                        <tr>
                                             <th> Status </th>
                                             <td>{{ $employee->status }}</td>
                                        </tr>
                                        <tr>
                                             <th> Experience</th>
                                             <td>{{ $employee->experience }}</td>
                                        </tr>
                                        <tr>
                                             <th> Vacation </th>
                                             <td>{{ $employee->vacation }}</td>
                                        </tr>
                                   
                                        <tr>
                                             <th> City </th>
                                             <td>{{ $employee->city }}</td>
                                        </tr>
                                        <tr>
                                             <th> Created_at </th>
                                             <td>{{ $employee->created_at->toDayDateTimeString() }}</td>
                                        </tr>
                                        <tr>
                                             <th> Update_at </th>
                                             <td>{{ $employee->updated_at == $employee->created_at ? "Not Update" : $employee->updated_at->toDayDateTimeString() }}</td>
                                        </tr>                                 

                                  
                              </table>

                              <span><a class="btn btn-dark btn-sm mt-3 " href="{{ route('employees.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Back</a></span>
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
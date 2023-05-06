@extends('backend.layouts.master')

@section('page_title', 'Employees List')
@section('content')

     <div class="container-xxl flex-grow-1 container-p-y text-black">
          <div class="row">
               <div class="col-md-12 mb-4 order-0">
                    <div class="card">
                         <div class="card-header">
                              <div class="d-flex justify-content-between pb-0">
                                   <h3>Employees List</h3>
                                   <span><a class="btn btn-dark btn-sm  " href="{{ route('employees.create') }}"><i class="fa-solid fa-plus"></i> Add</a></span>
                              </div>
                         </div>
                         <div class="card-body">
                              <table class="table table-hover table-bordered table table-striped">
                                   <thead class="bg-info bg-gradient ">
                                        <tr>
                                             <th class="text-white">SL</th>
                                             <th class="text-white">Name</th>
                                             <th class="text-white">Email</th>
                                             <th class="text-white">Phone</th>
                                             <th class="text-white">Nid No</th>
                                             <th class="text-white">Status</th>
                                             <th class="text-white">Salary</th>
                                             <th class="text-white">Photo</th>
                                             <th class="text-white">Action</th>
                                        </tr>
                                   </thead>

                                   <tbody class="mb-3">
                                        @foreach ($employees as $employee )
                                             
                                      
                                        <tr>
                                             <td class="p-1 text-center">{{ $loop->index+1 }}</td>
                                             <td class="p-1">{{ $employee->name }}</td>
                                             <td class="p-1">{{ $employee->email }}</td>
                                             <td class="p-1 text-center">{{ $employee->phone }}</td>
                                             <td class="p-1 text-center">{{ $employee->nid_no}}</td>
                                             <td class="p-1 text-center">
                                                  @if ($employee->status==0)
                                                  <span href="#" class="badge bg-danger" >Unactive</span>
                                                  @else
                                                       <span href="#" class="badge bg-success" >Active</span>
                                                  
                                                  @endif
                                                  
                                             
                                             </td>
                                             <td class="p-1 text-center" > {{ $employee->salary }} </td>
                                             <td class="p-1 align-middle text-center"> <img src="{{ asset('/image/employee/'. $employee->image) }}" alt=""  width="35px"> </td>
                                             <td class="p-1">
                                                  <div class="d-flex justify-content-between">
                                                       <a href="{{ route('employees.show', $employee->id) }}">
                                                            <button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
                                                        </a>
                                                       <a href="{{ route('employees.edit', $employee->id) }}">
                                                            <button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                                       </a>
     
                                                       

                                                       <form action="{{ route('employees.destroy',$employee->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button  class="btn btn-sm btn-danger delete_btn" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                         </form>
                                                  </div>
                                             </td>
                                        </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                              {{ $employees->links() }}
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
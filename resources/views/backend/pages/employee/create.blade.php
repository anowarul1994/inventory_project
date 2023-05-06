@extends('backend.layouts.master')

@section('page_title', 'Create New Employee')
@section('content')

     <div class="container-xxl flex-grow-1 container-p-y text-black">
          <div class="row">
               <div class="col-md-12 mb-4 order-0">
                    <div class="card">
                         <div class="card-header">
                              <div class="d-flex justify-content-between pb-0">
                                   <h3>Create New Employee</h3>
                                   <span><a class="btn btn-dark btn-sm  " href="{{ route('employees.index') }}"><i class="fa-solid fa-list"></i> List</a></span>
                              </div>
                         </div>
                         <div class="card-body">
                              <form method="POST" action="{{ route('employees.store')  }}" enctype="multipart/form-data">
                                   @csrf
                              
                                   <div class="row">
                                        <div class="col-md-4">
                                             <div class="mb-0 form-group">
                                                  <label for="name" class="form-label">Full Name</label>
                                                  <input type="text" value="{{ old('name') }}" class="form-control form-control-sm" id="name" name="name" placeholder="Enter your Full Name">
                                             </div>
                                   
                                             @error('name')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>

                                        <div class="col-md-4">
                                             <div class="mb-0 form-group">
                                                  <label for="email" class="form-label">Email address</label>
                                                  <input type="email" value="{{ old('email') }}" class="form-control form-control-sm" id="email" name="email" required placeholder="Enter your Email">
                                             </div>
                                   
                                             @error('email')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mb-0" >
                                                  <label for="phone" class="form-label">Phone</label>
                                                  <input type="number" value="{{ old('phone') }}"class="form-control form-control-sm" id="phone" min="11"   name="phone" placeholder="Enter your Phone">
                                             </div>
                                   
                                             @error('phone')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="address" class="form-label">Address</label>
                                                  <input type="text" value="{{ old('address') }}" class="form-control form-control-sm" id="address" required name="address" placeholder="Enter your Address">
                                             </div>
                                   
                                             @error('address')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        
                                        <div class="col-md-4">
                                             <div class="mt-3" >
                                                  <label for="experience" class="form-label">experience</label>
                                                  <input type="text" value="{{ old('experience') }}" class="form-control form-control-sm" required id="experience" name="experience" placeholder="Enter your experience">
                                             </div>
                                   
                                             @error('experience')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3" >
                                                  <label for="nid_no" class="form-label">Nid No</label>
                                                  <input type="number" value="{{ old('nid_no') }}" class="form-control form-control-sm" id="nid_no" min="10" name="nid_no" placeholder="Enter your Nid No">
                                             </div>
                                   
                                             @error('nid_no')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="salary" class="form-label">Salary</label>
                                                  <input type="number" value="{{ old('salary') }}" class="form-control form-control-sm" required id="salary" name="salary" placeholder="Enter your salary">
                                             </div>
                                   
                                             @error('salary')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="vacation" class="form-label">Vacation</label>
                                                  <input type="text" value="{{ old('vacation') }}" class="form-control form-control-sm" id="vacation" required name="vacation" placeholder="Enter your vacation">
                                             </div>
                                   
                                             @error('vacation')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="city" class="form-label">City</label>
                                                  <input type="text"  value="{{ old('city') }}" class="form-control form-control-sm" id="city" required name="city" placeholder="Enter your city">
                                             </div>
                                   
                                             @error('city')
                                                  <small class="text-danger position-relative">{{ $message }}</small>
                                             @enderror
                                        </div>
                              
                                             <div id="preview" class="mt-3">
                                                  
                                             </div>
                                             
                                        <div>
                                             <div class="mt-3">
                                                  <label for="image" class="form-label">Photo (size: 150 X 192 px)</label>
                                                  <input type="file" value="{{ old('image') }}" class="form-control form-control-sm" name="image" onchange="getImagePreview(event)">
                                             </div>                                   
                                             @error('image')
                                                  <small class="text-danger position-relative">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        
                                        

                                        
                                   </div>
                                   <button type="submit" class="btn btn-dark float-end mt-3"> Add Employee </button>

                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>



 
     @push('js')
     <script>
        
          function getImagePreview(event) {
               
               let image = URL.createObjectURL(event.target.files[0]);
               let imageDiv = document.getElementById('preview');
               let newImg = document.createElement('img');
               newImg.innerHTML = '';
               newImg.src= image;


               newImg.width = "150"
             

               imageDiv.appendChild(newImg);
              
          }

          
     </script>
          
     @endpush
  

@endsection
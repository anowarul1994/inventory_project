@extends('backend.layouts.master')

@section('page_title', 'Create New Customer')
@section('content')

     <div class="container-xxl flex-grow-1 container-p-y text-black">
          <div class="row">
               <div class="col-md-12 mb-4 order-0">
                    <div class="card">
                         <div class="card-header">
                              <div class="d-flex justify-content-between pb-0">
                                   <h3>Create New Customer</h3>
                                   <span><a class="btn btn-dark btn-sm  " href="{{ route('customers.index') }}"><i class="fa-solid fa-list"></i> List</a></span>
                              </div>
                         </div>
                         <div class="card-body">
                              <form method="POST" action="{{ route('customers.store')  }}" enctype="multipart/form-data">
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
                                                  <label for="shop_name" class="form-label">Shop Name</label>
                                                  <input type="text" value="{{ old('shop_name') }}" class="form-control form-control-sm" required id="shop_name" name="shop_name" placeholder="Enter your shopname">
                                             </div>
                                   
                                             @error('shop_name')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3" >
                                                  <label for="account_name" class="form-label">Account Name</label>
                                                  <input type="text" value="{{ old('account_name') }}" class="form-control form-control-sm" id="account_name"name="account_name" placeholder="Enter your Account_name">
                                             </div>
                                   
                                             @error('account_name')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="account_number" class="form-label">Account Number</label>
                                                  <input type="number" value="{{ old('account_number') }}" class="form-control form-control-sm" required id="account_number" name="account_number" placeholder="Enter your Account Number">
                                             </div>
                                   
                                             @error('account_number')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="bank_name" class="form-label">Bank Name</label>
                                                  <input type="text" value="{{ old('bank_name') }}" class="form-control form-control-sm" id="bank_name" required name="bank_name" placeholder="Enter your bank_name">
                                             </div>
                                   
                                             @error('bank_name')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="bank_branch" class="form-label">Bank Branch</label>
                                                  <input type="text" value="{{ old('bank_branch') }}" class="form-control form-control-sm" id="bank_branch" required name="bank_branch" placeholder="Enter your bank_branch">
                                             </div>
                                   
                                             @error('bank_branch')
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
                              
                                             
                                             
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="image" class="form-label">Photo (size: 150 X 192 px)</label>
                                                  <input type="file"  class="form-control form-control-sm" name="image" onchange="getImagePreview(event)">
                                             </div>                                   
                                             @error('image')
                                                  <small class="text-danger position-relative">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        
                                        <div id="preview" class="mt-3 col-md-4">
                                                  
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
               
               var image = URL.createObjectURL(event.target.files[0]);
               var imageDiv = document.getElementById('preview');
               var newImg = document.createElement('img');
               imageDiv.innerHTML='';
               newImg.src= image;

               newImg.height = "175"
               newImg.width = "150"
             

               imageDiv.appendChild(newImg);
               
          }

          
     </script>
          
     @endpush
  

@endsection
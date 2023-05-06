@extends('backend.layouts.master')

@section('page_title', 'Update Employee')
@section('content')

     <div class="container-xxl flex-grow-1 container-p-y text-black">
          <div class="row">
               <div class="col-md-12 mb-4 order-0">
                    <div class="card">
                         <div class="card-header">
                              <div class="d-flex justify-content-between pb-0">
                                   <h3>Update Employee</h3>
                                   
                              </div>
                         </div>
                         <div class="card-body">
                              <form action="{{ route('customers.update',$customer->id) }}" method="post" enctype="multipart/form-data">
                                   
                                   @csrf
                                   @method('put')
                                   <div class="row">
                                        <div class="col-md-4">
                                             <div class="mb-0 form-group">
                                                  <label for="name" class="form-label">Full Name</label>
                                                  <input type="text" value="{{ $customer->name }}" class="form-control form-control-sm" id="name" name="name" placeholder="Enter your Full Name">
                                             </div>
                                   
                                             @error('name')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>

                                        <div class="col-md-4">
                                             <div class="mb-0 form-group">
                                                  <label for="email" class="form-label">Email address</label>
                                                  <input type="email" value="{{ $customer->email }}" class="form-control form-control-sm" id="email" name="email" required placeholder="Enter your Email">
                                             </div>
                                   
                                             @error('email')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mb-0" >
                                                  <label for="phone" class="form-label">Phone</label>
                                                  <input type="number" value="{{ $customer->phone }}"class="form-control form-control-sm" id="phone" min="11"   name="phone" placeholder="Enter your Phone">
                                             </div>
                                   
                                             @error('phone')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="address" class="form-label">Address</label>
                                                  <input type="text" value="{{ $customer->address }}" class="form-control form-control-sm" id="address" required name="address" placeholder="Enter your Address">
                                             </div>
                                   
                                             @error('address')
                                                  <small class="text-danger position-absolute">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        
                                        <div class="col-md-4">
                                             <div class="mt-3" >
                                                  <label for="shop_name" class="form-label">Shop Name</label>
                                                  <input type="text" value="{{ $customer->shop_name }}" class="form-control form-control-sm" required id="experience" name="shop_name" placeholder="Enter your shop_name">
                                             </div>
                                   
                                             @error('shop_name')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3" >
                                                  <label for="account_name" class="form-label">Account Name</label>
                                                  <input type="text" value="{{ $customer->account_name }}" class="form-control form-control-sm" id="account_name" name="account_name" placeholder="Enter your account_name">
                                             </div>
                                   
                                             @error('account_name')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="account_number" class="form-label">Account Number</label>
                                                  <input type="number" value="{{ $customer->account_number }}" class="form-control form-control-sm" required id="account_number" name="account_number" placeholder="Enter your account_number">
                                             </div>
                                   
                                             @error('account_number')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="bank_name" class="form-label">Bank Name</label>
                                                  <input type="text" value="{{ $customer->bank_name }}" class="form-control form-control-sm" id="bank_name" required name="bank_name" placeholder="Enter your bank_name">
                                             </div>
                                   
                                             @error('bank_name')
                                                  <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="bank_branch" class="form-label">Bank Branch</label>
                                                  <input type="text"  value="{{ $customer->bank_branch }}" class="form-control form-control-sm" id="bank_branch" required name="bank_branch" placeholder="Enter your bank_branch">
                                             </div>
                                   
                                             @error('bank_branch')
                                                  <small class="text-danger position-relative">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div class="col-md-4">
                                             <div class="mt-3">
                                                  <label for="city" class="form-label">City</label>
                                                  <input type="text"  value="{{ $customer->city }}" class="form-control form-control-sm" id="city" required name="city" placeholder="Enter your city">
                                             </div>
                                   
                                             @error('city')
                                                  <small class="text-danger position-relative">{{ $message }}</small>
                                             @enderror
                                        </div>
                              
                                             
                                             
                                        <div class="col-md-8">
                                             <div class="mt-3">
                                                  <label for="image" class="form-label">Photo (size: 150 X 192 px)</label>
                                                  <input type="file" value="{{ $customer->image }}" class="form-control form-control-sm" name="image" onchange="getImagePreview(event)">
                                             </div>                                   
                                             @error('image')
                                                  <small class="text-danger position-relative">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <div id="preview" class="mt-3">
                                            
                                             <img src="{{ asset('/image/customers/'. $customer->image) }}" alt="">
                                             
                                        </div>
                                              
                                   </div>
                                   
                              <button type="submit" class="btn btn-dark btn-sm ms-3 mt-3 float-end"><i class="fa-solid fa-pen-to-square"></i> Update Employee </button>
                                   
                              </form>
                              <span ><a class="btn btn-info btn-sm ms-3  mt-3 float-end " href="{{ route('customers.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Back</a></span>
                                   
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
               imageDiv.innerHTML = '';
               newImg.src= image;


               newImg.width = "150"
             

               imageDiv.appendChild(newImg);
              
          }

          
     </script>
          
     @endpush
  

@endsection
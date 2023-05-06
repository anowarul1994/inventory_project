<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
       return view('backend.pages.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
            'city' => 'required',
        ]);

        $customer_data = $request->except('image');

        if($request->file('image')){
            $image = $request->file('image');
            $width=150;
            $height = 192;
            $path = 'image/customers/';
            $name = Str::slug($request->input('name').'-'.Carbon::now()->toDateTimeString()).'.webp';

            $customer_data['image'] = $name;

            ImageUploadController::imageUpload($image, $width, $height, $path, $name);
        }

        Customer::create($customer_data);
        session()->flash('msg', 'Customer Created Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('customers.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
       
        return view('backend.pages.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('backend.pages.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
            'city' => 'required',
        ]);
        

        $customerData = Customer::find($id);
       
        $customer_data = $request->except('image');
            
     
        if ($request->file('image')){
            $photo = $request->file('image');
            $width = 150;
            $height = 192;
            $path = 'image/customers/';
            $name = Str::slug($request->input('name').'-'.Carbon::now()->toDayDateTimeString()).'.webp';

            $customer_data['image'] = $name; 

            ImageUploadController::imageUpload($photo, $width, $height, $path, $name);   
                 
            if( $customerData->image!= null){
            
            ImageUploadController::unlinkImage($path, $customerData->image);
        }
        }
        else{
            $customer_data['image']= $customerData->image; 
        }
        
        $customerData->update($customer_data);
        
        session()->flash('msg', 'Customer Updated Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        
        if( $customer->image!= null){
            $path = 'image/customers/';
            ImageUploadController::unlinkImage($path, $customer->image);
        }
        
        $customer->delete();
        session()->flash('msg', 'Customer Delete Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('customers.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function create(){
        return Inertia::render('create', [
            'errors' => session('errors') ? session('errors')->getBag('default')->getMessages() : (object) []
        ]);
    }
    public function store(Request $request)
    {
        // Log the request data for debugging
        Log::info('Request Data: ', $request->all());
        
        try {
            $validated = $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|email|unique:customers',
                'phone' => 'required|unique:customers|numeric'
            ]);
            
            Log::info('Validated Data: ', $validated);
            
            Customer::create($validated);
            
            Log::info('Customer created successfully.');

           return Redirect::route('customers.index');
            
            // return redirect()->route('customers.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation Errors: ', $e->errors());
            
            // Redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function index(){
        return Inertia::render('index',[
            'customers'=>Customer::all()->map(function($customer){
                return [
                    'id'=>$customer->id,
                    'name'=>$customer->name,
                    'email'=>$customer->email,
                    'phone'=>$customer->phone,

                ];
            })
        ]);
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return Redirect::route('customers.index');
    }


    public function edit(Customer $customer){
        return Inertia::render('edit', [
            'customer' => $customer,
            'errors' => session('errors') ? session('errors')->getBag('default')->getMessages() : (object) []
        ]);
    }

    public function update(Request $request,Customer $customer){
        Log::info('Request Data: ', $request->all());
        
        try {
            $validated = $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|email',
                'phone' => 'required|numeric'
            ]);
            
            Log::info('Validated Data: ', $validated);
            
            $customer->update($validated);
            
            Log::info('Customer created successfully.');

           return Redirect::route('customers.index');
            
            // return redirect()->route('customers.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation Errors: ', $e->errors());
            
            // Redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function show(Customer $customer){
        return Inertia::render('view',[
            'customer'=>$customer
        ]);
    }
    
}

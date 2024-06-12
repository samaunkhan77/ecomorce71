<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function CustomerRegister()
    {
        return view('backend.pages.customer.register');
    }

    public function CustomerRegisterPost(Request $request)
    {
        try {
            $request->validate([
                'customer_name' => 'required',
                'customer_email' => 'required|email|unique:customers,customer_email',
                'customer_password' => 'required',
            ]);

            Customer::create([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_password' => Hash::make($request->customer_password),
            ]);

            auth()->login( Customer::where('customer_email', $request->customer_email)->first());


            toast()->success('Registration Successful');
            return redirect()->route('home');
        }

        catch (Exception $exception) {
            toast()->error($exception->getMessage());
            return redirect()->back();
        }
    }

    public function CustomerLogin()
    {
        return view('frontend.pages.customer.login');
    }

    public function CustomerLoginPost(Request $request)
    {
        try {
            $request->validate([
                'customer_email' => 'required|email',
                'customer_password' => 'required',
            ]);

            $customer = Customer::where('customer_email', $request->customer_email)->first();

            if ($customer && Hash::check($request->customer_password, $customer->customer_password)) {
                auth()->login($customer);
                toast()->success('Login Successful');
                return redirect()->route('home');
            }

            toast()->error('Invalid Credentials');
            return redirect()->back();
        }

        catch (Exception $exception) {
            toast()->error($exception->getMessage());
            return redirect()->back();
        }
    }
}

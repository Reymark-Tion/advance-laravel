<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Repositories\CustomerRepository;
use App\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{

    private $customerRepository;

    //interfacing
    //public function __construct(CustomerRepositoryInterface $customerRepository){
    //concrete implementation
    public function __construct(CustomerRepository $customerRepository){

        $this->customerRepository = $customerRepository;

    }

    public function index()
    {
        // $customers = Customer::orderBy('name')
        // ->where('active', 1)
        // ->with('user')
        // ->get();
        
            $customers = $this->customerRepository->all();

        return json_encode($customers, JSON_PRETTY_PRINT);
    }

    public function show($customerId)
    {
        // $customer =  Customer::where('id', $customerId)
        // ->where('active', 1)
        // ->with('user')
        // ->firstOrfail();

        return $this->customerRepository->findById($customerId);

        return json_encode($customer, JSON_PRETTY_PRINT);
        
      
    }

    public function update($customerId)
    {

        // $customer = Customer::where('id', $customerId)->firstOrfail();

        // $customer->update(request()->only('name'));

        $this->customerRepository->update($customerId);

        return redirect('/customer/' . $customerId);
    }

    public function destroy($customerId)
    {
        // $customer = Customer::where('id', $customerId)->delete();

        $this->customerRepository->delete($customerId);

        return redirect('/');
    }
}

<?php


namespace App\Repositories;
use App\Customer;
use App\Interfaces\CustomerRepositoryInterface;

//class CustomerRepository implements CustomerRepositoryInterface
class CustomerRepository
//class CustomerRepository
{
    public function all()
    {
        return Customer::orderBy('name')
        ->where('active', 1)
        ->with('user')
        ->get()
        ->map->format();
    }

    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
        ->where('active', 1)
        ->with('user')
        ->firstOrfail()
        ->format();
    }

    public function update($customerId)
    {
         $customer = Customer::where('id', $customerId)->firstOrfail();

         $customer->update(request()->only('name'));
    }

    public function delete($customerId)
    {
         Customer::where('id', $customerId)->delete();
    }
}
<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Helper\ResponseMessageHelper;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return view('admin.customer.index', ['customers' => $this->customerRepository->getWithPagination(PaginationHelper::MEDIUM_PAGINATION)]);
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CreateCustomerRequest $createCustomerRequest)
    {
        try {
            $this->customerRepository->create($createCustomerRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('customers.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_created'], Customer::$name));
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.update', ['customer' => $customer]);
    }

    public function update(UpdateCustomerRequest $updateCustomerRequest, Customer $customer)
    {
        try {
            $this->customerRepository->update($customer->id, $updateCustomerRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('customers.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_updated'], Customer::$name));
    }

    public function destroy(Customer $customer)
    {
        try {
            $this->customerRepository->delete($customer);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('customers.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_deleted'], Customer::$name));
    }
}

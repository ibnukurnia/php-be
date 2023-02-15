<?php


namespace App\Services;

use App\Interfaces\ShippingInterface;
use App\Models\Transaction;
use App\Repository\ShippingRepository;

class JntService implements ShippingInterface
{
    private int $price = 150000;
    public function __construct(private ShippingRepository $shippingRepository)
    {
        
    }
    
    public function store(array $request) :Transaction
    {
        $request['harga'] = $this->price;
        return $this->shippingRepository->storeTransaction($request);
    }
}


<?php


namespace App\Services;

use App\Interfaces\ShippingInterface;
use App\Models\Transaction;
use App\Repository\ShippingRepository;
use Illuminate\Http\Request;

class JneService implements ShippingInterface
{
    private int $price = 100000;
    public function __construct(private ShippingRepository $shippingRepository)
    {
        
    }

    public function store(array $request) :Transaction
    {
        $request['harga'] = $this->price;
        return $this->shippingRepository->storeTransaction($request);
    }
}

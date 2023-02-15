<?php


namespace App\Interfaces;

use App\Models\Transaction;

interface ShippingInterface
{
    public function store(array $request) :Transaction ;
}
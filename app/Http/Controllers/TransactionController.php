<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Interfaces\ShippingInterface;
use App\Repository\ShippingRepository;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    public function __construct(private ShippingRepository $shippingRepository)
    {
        
    }

    public function index()
    {
        $transactions = $this->shippingRepository->getAllTransactions();
        return TransactionResource::collection($transactions);
    }

    public function show(int $id)
    {
        $transaction = $this->shippingRepository->getTransaction($id);
        return new TransactionResource($transaction);
    }

    public function store(StoreTransactionRequest $request, ShippingInterface $shippingService)
    {
        $newTransaction = $shippingService->store($request->all());
        return response()->json([
            "message" => "success creating new transaction",
            "data" => $newTransaction
        ],201);
    }

}

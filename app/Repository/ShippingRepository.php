<?php


namespace App\Repository;

use App\Models\Transaction;

class ShippingRepository 
{
    public function getAllTransactions()
    {
        return Transaction::paginate();
    }

    public function getTransaction(int $id)
    {
        return Transaction::findOrFail($id);
    }

    public function storeTransaction(array $data)
    {
        $transaction = Transaction::create([
            'nama_pengirim' => $data['nama_pengirim'],
            'alamat_pengirim' => $data['alamat_pengirim'],
            'nama_barang' => $data['nama_barang'],
            'nama_penerima' => $data['nama_penerima'],
            'alamat_penerima' => $data['alamat_penerima'],
            'expedisi' => $data['expedisi'],
            'harga' => $data['harga']
        ]);

        return $transaction;
    }
}

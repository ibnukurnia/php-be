<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_pengirim' => $this->nama_pengirim,
            'alamat_pengirim' => $this->alamat_pengirim,
            'nama_barang' => $this->nama_barang,
            'nama_penerima' => $this->nama_penerima,
            'alamat_penerima' => $this->alamat_penerima,
            'expedisi' => $this->expedisi,
            'harga' => $this->harga
        ];
    }
}

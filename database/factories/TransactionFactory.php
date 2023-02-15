<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = rand(0,2);
        return [
            'nama_pengirim' => fake('id_ID')->name(),
            'alamat_pengirim' => fake('id_ID')->city(),
            'nama_barang' => fake('id_ID')->word(),
            'nama_penerima' => fake('id_ID')->name(),
            'alamat_penerima' => fake('id_ID')->city(),
            'expedisi' => 'JNE',
            'harga' => 100000
        ];
    }

    
}

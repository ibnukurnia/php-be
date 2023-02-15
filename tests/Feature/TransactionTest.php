<?php

namespace Tests\Feature;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;
    public function test_api_success_store_new_transaction()
    {
        $transaction = [
            'nama_pengirim' => 'Jhon Doe',
            'alamat_pengirim' => 'Jakarta Barat',
            'nama_barang' => 'televisi',
            'nama_penerima' => 'Jane Doe',
            'alamat_penerima' => 'Surabaya',
            'expedisi' => 'JNE'
        ];
        $response = $this->postJson('/api/transaction', $transaction);

        $response->assertStatus(201)
        ->assertJson([
            'message' => 'success creating new transaction'
        ]);
    }

    public function test_api_error_expedisi_not_found()
    {
         $transaction = [
            'nama_pengirim' => 'Jhon Doe',
            'alamat_pengirim' => 'Jakarta Barat',
            'nama_barang' => 'televisi',
            'nama_penerima' => 'Jane Doe',
            'alamat_penerima' => 'Surabaya',
            'expedisi' => 'lkajsfkjh'
        ];
        $response = $this->postJson('/api/transaction', $transaction);

        $response->assertStatus(400)
        ->assertJson([
            'message' => 'Shipper Tidak DiTemukan!'
        ]);       
    }

    public function test_api_validation_transaction_error()
    {
        
        $transaction = [
            'alamat_pengirim' => 'Jakarta Barat',
            'nama_barang' => 'televisi',
            'nama_penerima' => 'Jane Doe',
            'alamat_penerima' => 'Surabaya',
            'expedisi' => 'JNE'
        ];

        $response = $this->postJson('api/transaction',$transaction);

        $response->assertStatus(422)
        ->assertJsonValidationErrorFor('nama_pengirim');

    }

    public function test_api_get_all_transaction()
    {
        $transaction = Transaction::factory(3)->create();
        $resource = TransactionResource::collection($transaction);
        $response = $this->getJson('/api/transaction');

        $response->assertStatus(200)
        ->assertJson($resource->response($response)->getData(true));
    }

    public function test_api_get_transaction()
    {
        $transaction = Transaction::factory()->create();
        $resource = new TransactionResource($transaction);
        $response = $this->getJson('/api/transaction/1');

        $response->assertStatus(200)
        ->assertJson($resource->response($response)->getData(true));
    }
}

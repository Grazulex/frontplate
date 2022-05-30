<?php

namespace App\Console\Commands;

use App\Enums\OriginEnums;
use App\Models\Plate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use PhpParser\JsonDecoder;

class ImportInmotivCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'otm:import:inmotiv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import order from InMotiv';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('https://auth-test.evobel.net/auth/realms/12apps-test/protocol/openid-connect/token',
                [

                        'client_id' => 'otm-test_3tzb8hnq7jyf',
                        'client_secret' => '1mfN81A2YsN73Blv4frxw8KtxRtEQDT2',
                        'scope' => 'openid',
                        'grant_type' => 'client_credentials'
                ]
            );
        if ($response->status() === 200) {
            $token = $response->json('access_token');
            $responseDatas = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.$token
            ])->get('https://api-evoprd3.inmotiv.be/webdiv/orders/1.0');
            if ($responseDatas->status() === 200) {
                $orders = $responseDatas->json();
                $orders = $orders['orders'];
                foreach ($orders as $order) {
                    $plate = Plate::where(['order_id'=>$order['order_id']])->first();
                    if (!$plate) {
                        $isCod = false;
                        $this->info('Make new plate for order '.$order['order_id']);
                        if ($order['payment_method'] === 'COD') {
                            $isCod = true;
                        }
                        $plate = Plate::create([
                            'created_at'    => $order['order_date'],
                            'reference'     => $order['plate_number'],
                            'type'          => $order['plate_type'],
                            'origin'        => OriginEnums::INMOTOV->value,
                            'order_id'      => $order['order_id'],
                            'customer'      => $order['destination_name'],
                            'customer_key'  => $order['destination_key'],
                            'amount'        => (float)(str_replace(',','.',$order['price'])),
                            'is_cod'        => $isCod,
                            'datas'         => $order
                        ]);
                    }
                }
            } else {
                $this->error($response->status());
            }
        } else {
            $this->error($response->status());
        }
    }
}

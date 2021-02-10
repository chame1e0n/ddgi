<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use App\Models\FromSiteOrder;

class GetDataFromSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:getData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending request to the ddgi site and get changes in their db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws GuzzleException
     */
    public function handle()
    {
        $statuses = [
            1 => 'Создан',
            2 => 'Успешно проведен',
            3 => 'Забракован',
            4 => 'Расторгнут'
        ];
        $client = new Client();
        $url = Config::get('baseauth.url');

        $response = $client->request(
            'GET', /*instead of GET, you can use POST, PUT, DELETE, etc*/
            $url,
            [
                'auth' => [Config::get('baseauth.username'), Config::get('baseauth.password')] /*if you don't need to use a password, just leave it null*/
            ]
        );

        $decodedJsonData = json_decode($response->getBody());

        foreach ($decodedJsonData as $data) {
            // If no matching model exists with order_id = id from decoded data, create one.
            $fromSiteOrder = FromSiteOrder::updateOrCreate(
                [
                    'order_id' => $data->id
                ],
                [
                    'title' => $data->title,
                    'object_title' => $data->object_title,
                    'amount' => $data->amount,
                    'prize' => $data->prize,
                    'status' => $statuses[intval($data->status)],
                    'timestamp' => date('Y-m-d H:i:s', strtotime($data->timestamp)),
                    'term' => date('Y-m-d H:i:s', strtotime($data->term)),
                    'inventory_number' => $data->inventory_number,
                    'total_area' => $data->total_area,
                    'city_property' => $data->city_property,
                    'street' => $data->street,
                    'type_property' => $data->type_property,
                    'matches_registration_address' => $data->matches_registration_address,
                    'username' => $data->user->username,
                    'first_name' => $data->user->first_name,
                    'last_name' => $data->user->last_name,
                    'middle_name' => $data->user->middle_name,
                    'is_active' => $data->user->is_active,
                    'avatar' => $data->user->avatar,
                    'birth_day' => $data->user->birth_day,
                    'serial_number' => $data->user->serial_number,
                    'passport_number' => $data->user->passport_number,
                    'date_issue' => $data->user->date_issue,
                    'issued_by' => $data->user->issued_by,
                    'phone' => $data->user->phone,
                    'email_index' => $data->user->email_index,
                    'city' => $data->user->city,
                    'district' => $data->user->district,
                    'user_street' => $data->user->street,
                    'apartment_number' => $data->user->apartment_number,
                    'home_number' => $data->user->home_number
                ]
            );
        }
    }
}

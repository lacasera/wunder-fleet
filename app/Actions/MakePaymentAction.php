<?php
namespace App\Actions;

use App\Events\PaymentMade;
use GuzzleHttp\Client;
use App\Actions\Interfaces\MakePaymentInterface;

class MakePaymentAction implements MakePaymentInterface
{
    const ENDPOINT = 'https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data';

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $userId
     * @param $accountOwner
     * @param $iban
     * @return mixed
     */
    public function execute($userId, $accountOwner, $iban): object
    {
        $response = $this->client->post(self::ENDPOINT, [
                "json" => [
                    'customerId' => $userId,
                    'owner' => $accountOwner,
                    'iban' => $iban
                ]
            ]
        );

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());

            event(new PaymentMade($userId, $data->paymentDataId));

            return $data;
        }
    }
}
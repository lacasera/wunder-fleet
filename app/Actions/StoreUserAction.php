<?php
namespace App\Actions;

use App\User;

class StoreUserAction
{

    public function execute(array  $data)
    {
        $personaData =  $this->getPersonalInformation($data);

        $user = User::updateOrCreate([
            'phone_number' => $personaData['phone_number']
        ], $personaData);

        return $user;
    }

    private function getPersonalInformation(array  $data)
    {
        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'zip_code' => $data['zip_code'],
            'city' => $data['city'],
            'street' => $data['street'],
            'house_number' => $data['house_number'],
        ];
    }
}
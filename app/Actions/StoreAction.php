<?php
namespace App\Actions;

use App\User;

class StoreAction
{

    public function execute(array  $data)
    {
        $personaData =  $this->getPersonalInformation($data);

        $addressData = $this->getAddressInformation($data);

        $user = User::updateOrCreate(['phone_number' => $personaData['phone_number']], $personaData);

        $address = $user->address()->updateOrCreate(['user_id' => $user->id],  $addressData);

        return compact('user','address');
    }

    private function getPersonalInformation(array  $data)
    {
        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
        ];
    }

    private function getAddressInformation(array  $data)
    {
        return [
            'zip_code' => $data['zip_code'],
            'city' => $data['city'],
            'street' => $data['street'],
            'house_number' => $data['house_number'],
        ];
    }

}
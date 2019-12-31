<?php
namespace App\Actions\Interfaces;

interface MakePaymentInterface
{
    public function execute($userId, $owner, $iban) : object;
}
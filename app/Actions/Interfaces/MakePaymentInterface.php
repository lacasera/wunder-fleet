<?php
/**
 * Created by PhpStorm.
 * User: williambarfi
 * Date: 23/12/2019
 * Time: 7:33 AM
 */
namespace App\Actions\Interfaces;

interface MakePaymentInterface
{
    public function execute($userId, $owner, $iban);
}
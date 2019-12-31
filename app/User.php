<?php

namespace App;

use App\Actions\Interfaces\MakePaymentInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' '. $this->last_name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function makePayment(string $iban): string 
    {
        $paymentAction = app()->make(MakePaymentInterface::class);

        return $paymentAction->execute($this->id, $this->full_name, $iban)->paymentDataId;
    }

}

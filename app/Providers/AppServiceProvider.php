<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Actions\MakePaymentAction;
use App\Actions\Interfaces\MakePaymentInterface;
use Tests\Fixtures\MakePaymentAction as MockedAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $concretePaymentClass = $this->app->runningUnitTests() ? MockedAction::class : MakePaymentAction::class;

        $this->app->bind(MakePaymentInterface::class, $concretePaymentClass);
    }

}

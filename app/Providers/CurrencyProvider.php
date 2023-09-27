<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class CurrencyProvider extends ServiceProvider
{

    private $apiKey;


    public function __construct()
    {
        $this->apiKey = env("CURRENCY_FREAKS_API_KEY");
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    //  $baseCurrency debe estar en USD 
    //  $targetCurrency al tipo de cambio que queremos en este caso BOB (Bolivianos)
    public function CurrencyChange($baseCurrency, $targetCurrency)
    {
        $url = "https://api.currencyfreaks.com/v2.0/rates/latest?apikey={$this->apiKey}&symbols={$targetCurrency}&base={$baseCurrency}";

        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json();
            $rate = $data['rates'][$targetCurrency];


            return $rate;
        } else {
            return "Error al obtener la tasa de cambio";
        }
    }
}

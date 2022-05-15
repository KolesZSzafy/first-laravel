<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('linkParams', $this->queryParams());
    }

    private function queryParams()
    {
        $request = Request();

        $linkQuery = $request->all();
        $linkParams = "?";
        $numItems = count($linkQuery);
        $i = 0;
        foreach ($linkQuery as $key => $params) {
            $linkParams = $linkParams . $key . '=' . $params;
            if (++$i < $numItems) {
                $linkParams .= '&';
            }
        }
        return $linkParams;
    }
}

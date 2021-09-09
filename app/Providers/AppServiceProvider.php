<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ContactUs;
use Illuminate\Pagination\Paginator;
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
        $tablefind = \Schema::hasTable('contact_us');
        if($tablefind){
            $contact = ContactUs::where('id',1)->where('type',1)->first();
        }else{
            $contact = (object)[];

        }
        view()->share('contact', $contact);
        Paginator::useBootstrap();
    }
}

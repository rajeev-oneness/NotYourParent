<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ContactUs;
use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

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
        \View::composer('*', function ($view) {
            $contact = (object)[];
            $notifications = [];
            $contactTable = Schema::hasTable('contact_us');
            if ($contactTable) {
                $contact = ContactUs::where('id', 1)->where('type', 1)->first();
            }
            if ($user = auth()->user()) {
                $notifications = Notification::where('receiver_id', $user->id)->latest()->get();

                $unreadCount = 0;
                foreach ($notifications as $index => $noti) {
                    if ($noti->read_flag == 0) {
                        $unreadCount++;
                    }
                }
                $notifications->unreadCount = $unreadCount;
            }
            $view->with('contact', $contact);
            $view->with('notification', $notifications);
        });
        Paginator::useBootstrap();
    }
}

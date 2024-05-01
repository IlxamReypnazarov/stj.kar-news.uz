<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Message;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $message = Message::where('user_id', $user_id)
                                    ->where('status',0)
                                    ->get();
                $view->with('message', $message);
            }
        });


        View::composer('*', function ($view) {
            if (Auth::check()) {
                $messageApp = Application::where('status','process')->count();
                $view->with('messageApp', $messageApp);
            }
        });
    }
}

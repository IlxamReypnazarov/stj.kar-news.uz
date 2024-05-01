<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Using class based composers...
        view()->composer(
            'profile', 'App\Http\ViewComposers\ProfileComposer'
        );

        // Using Closure based composers...
        view('student.include.navbar')->composer('navbar', function (View $view) {
            $user=Auth::user();
            $messages=Message::where('user_id',$user->id)->get();
            $view->with('messages',$messages);
        });
    }
}

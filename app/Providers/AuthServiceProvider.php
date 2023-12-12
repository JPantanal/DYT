<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use function Laravel\Prompts\outro;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //phpinfo();

        //custom email verification
        VerifyEmail::toMailusing(function(object $notifiable, string $url){
            return(new MailMessage)
                ->greeting('Good Day!')
                ->subject('Dayton Tutoring Email Verification')
                ->line('Click the link below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
    }


}

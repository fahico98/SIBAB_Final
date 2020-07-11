<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationRulesProvider extends ServiceProvider
{
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
        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
        Validator::extend('alpha_start_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
        Validator::extend('email_sena', function($attribute, $value)
        {
            return preg_match('/^[a-zA-Z0-9._-]+@misena.edu.co+$/', $value);
        });
        Validator::extend('email_sena_spaces', function($attribute, $value)
        {
            return preg_match('/^[.\s][a-zA-Z0-9._-]+@misena.edu.co[.\s]+$/', $value);
        });
        Validator::extend('security_password', function($attribute, $value)
        {
            return preg_match('/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{6,12}$/', $value);
        });

        Validator::extend('email_admin', function($attribute, $value)
        {
            return preg_match('/^[a-zA-Z0-9._-]+@sena.edu.co+$/', $value);
        });
    }
}

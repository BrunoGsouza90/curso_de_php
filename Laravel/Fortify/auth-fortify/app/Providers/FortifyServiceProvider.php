<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider {

    public function register(): void {
        
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {

            public function toResponse($request) {

                return redirect('/login');

            }

        });

    }

    public function boot(): void {

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {

            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);

        });

        RateLimiter::for('two-factor', function (Request $request) {

            return Limit::perMinute(5)->by($request->session()->get('login.id'));

        });

        Fortify::loginView(function () {

            return view('auth.login');

        });

        Fortify::registerView(function () {

            return view('auth.register');

        });

        Fortify::confirmPasswordView(function (Request $request) {

            session(['confirmar_senha' => 'confirmando']);

            return view('auth.two-factor-challenge');

        });

        Fortify::twoFactorChallengeView(function () {

            session(['confirmar_senha' => 'confirmar_novamente']);

            return view('auth.two-factor-challenge');

        });

    }

}
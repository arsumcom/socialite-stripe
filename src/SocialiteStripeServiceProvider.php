<?php

namespace ArsumCom\SocialiteStripe;

use Socialite;
use Illuminate\Support\ServiceProvider;

class SocialiteStripeServiceProvider extends ServiceProvider
{
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    Socialite::extend('stripe', function ($app) {
      $config = $app['config']['services.stripe'];

      return Socialite::buildProvider(SocialiteStripeProvider::class, $config);
    });
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
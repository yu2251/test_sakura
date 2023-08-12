<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 🔽 1行追加 🔽
use Illuminate\Routing\UrlGenerator;

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
  // 🔽 編集 🔽
  public function boot(UrlGenerator $url)
  {
    $url->forceScheme('https');
  }
}


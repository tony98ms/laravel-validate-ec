<?php

namespace Tonystore\LaravelValidateEc;

use Illuminate\Support\Facades\Validator;

class LaravelValidateEcProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Languages names.
     *
     * @var array|string[]
     */
    public array $langs = [
        'en',
        'es',
    ];
    public function boot()
    {
        Validator::extend('document_ec', '\Tonystore\LaravelValidateEc\LaravelValidateEc@validate');
        Validator::replacer('document_ec', '\Tonystore\LaravelValidateEc\LaravelValidateEc@replace');
    }

    /**
     * Publish lang files.
     */
    private function publishLangFiles(): void
    {
        foreach ($this->langs as $lang) {
            $this->publishes([
                __DIR__ . "/lang/$lang" => lang_path($lang),
            ], "validate-lang-$lang");
        }
    }
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishLangFiles();
        }
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'validation');
    }
}

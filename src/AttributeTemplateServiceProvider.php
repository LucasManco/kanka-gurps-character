<?php

namespace Kanka\GurpsCharacter;

use Illuminate\Support\ServiceProvider;

class AttributeTemplateServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gurpscharacter');

        $this->loadTranslationsFrom(realpath(__DIR__.'/../publishable/lang'), 'gurpscharacter');


        // Assets
        $this->publishes([
            __DIR__.'/../publishable/assets' => public_path('vendor/gurpscharacter'),
        ], 'dnd5emonster');

        // Config
        $this->publishes([
            __DIR__.'/../publishable/config/gurpscharacter.php' => config_path('gurpscharacter.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../publishable/config/gurpscharacter.php', 'gurpscharacter'
        );

        // Translations
        $this->loadTranslationsFrom(__DIR__.'/../publishable/lang', 'gurpscharacter');

        $this->publishes([
            __DIR__.'/../publishable/lang' => resource_path('lang/vendor/gurpscharacter'),
        ]);
    }
}

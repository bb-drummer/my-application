<?php
/**
 * SlmLocale Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    /**
     * Default locale
     *
     * Some good description here. Default is something
     *
     * Accepted is something else
     */
    'default' => 'en_US',

    /**
     * Supported locales
     *
     * Some good description here. Default is something
     *
     * Accepted is something else
     */
    'supported' => array('de_DE', 'en_US', 'fr_FR'),

    'aliases' => array(
            'de' => 'de_DE',
            'en' => 'en_US',
            'fr' => 'fr_FR',
            'es' => 'es_ES',
            'nl' => 'nl_NL',
            'it' => 'it_IT',
     ),

    /**
     * Strategies
     *
     * Some good description here. Default is something
     *
     * Accepted is something else
     */
    'strategies' => array(
        /* array(
            'name'    => 'host',
            'options' => array(
                'domain'  => 'www.example.:locale',
                'aliases' => array('com' => 'en_US', 'net' => 'en_US', 'de' => 'de_DE'),
            ),
        ), */
        array(
            'name'     => 'uripath',
            'options'  => array(
                'aliases' => array('de' => 'de_DE', 'en' => 'en_US', 'fr' => 'fr_FR'),
            ),
            'priority' => 1
        ),
    
        array(
            'name'     => 'acceptlanguage',
            'priority' => 0.5
        )
    ),

    /**
     * End of SlmLocale configuration
     */
);

/**
 * You do not need to edit below this line
 */
return array(
    'slm_locale' => $settings
);

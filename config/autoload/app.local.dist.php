<?php
/**
 * Local Configuration Override
 *
 * This configuration override file is for overriding environment-specific and
 * security-sensitive configuration information. Copy this file without the
 * .dist extension at the end and populate values as needed.
 *
 * @NOTE: This file is ignored from Git by default with the .gitignore included
 * in ZendSkeletonApplication. This is a good practice, as it prevents sensitive
 * credentials from accidentally being committed into version control.
 */

return array(
        
    /**
     * global database setup
     **/
    'db' => array( 
            'driver'    => 'PdoMysql',
            'hostname'  => 'database.host', // with some system configurations try IP instead of a hostname
            'database'  => 'dbname',
            'username'  => 'dbuser',
            'password'  => 'dbpassword',
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
        
    /**
     * cache configuration, un-comment when enabled in your system/php/host-setup
     **/
    /*'caches' => array(
        'CacheService' => array(
            'adapter' => array(
                'name'     =>'memcached',
                'ttl'      => 3600,
                'lifetime' => 3600,
                'options'  => array(
                    'servers'   => array(
                        array(
                            '127.0.0.1', 11211
                        )
                    ),
                    'namespace'  => 'my-application',
                    'liboptions' => array (
                        'COMPRESSION'     => true,
                        'binary_protocol' => true,
                        'no_block'        => true,
                        'connect_timeout' => 100
                    )
                )
            ),
            'plugins' => array(
                'exception_handler' => array(
                    'throw_exceptions'    => false
                ),
            ),
        ),
    ),*/
        
    /**
     * SMTP configuration
     **/
    'zfcuser_smtp' => array(
        'name'              => 'example.com',
        'host'              => '127.0.0.1',
        'port'              => 587, // Notice port change for TLS is 587
        'connection_class'  => 'plain',
        'connection_config' => array(
            'username' => 'user',
            'password' => 'pass',
        ),
    ),
        
    /**
     * HTTP basepath in email links
     **/
    'zfcuser_mail_http_basepath' => "http://".$_SERVER["HTTP_HOST"],
        
    /**
     * registration redirect route to go upon successful user registration, 
     * user's confirmation and admin's activation
     **/
    'zfcuser_registration_redirect_route' => 'home', 
        
    /**
     * user must confirm new registration via mail
     **/
    'zfcuser_user_must_confirm' => true, 
        
    /**
     * email adress to send confirmation mail from
     **/
    'zfcuser_admin_from_email' => 'no-reply@example.com',
        
    /**
     * email subject for confirmation mail
     **/
    'zfcuser_confirm_subject' => "[myApplication] Benutzer-Bestätigung",
        
    /**
     * admin must active new user via notification mail
     **/
    'zfcuser_admin_must_activate' => true,
        
    /**
     * admin's email adress to recieve activation mail
     **/
    'zfcuser_admin_to_email' => 'useradmin@example.com',
        
    /**
     * email subject for activation mail
     **/
    'zfcuser_activate_subject' => "[myApplication] Benutzer-Aktivierung",
        
);

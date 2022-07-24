<?php 
if (isset($_ENV['REDIS_DSN']) && !empty($_ENV['REDIS_DSN'])) {
    ini_set('session.save_path', $_ENV['REDIS_DSN']);
}

phpinfo(); die;

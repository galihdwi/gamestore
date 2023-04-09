<?php

/**
 * constants config
 */
if (file_exists(__DIR__ . '/../config/constants.php')) {
    require __DIR__ . '/../config/constants.php';
} else {
    die('Please copy config/constants-example.php to config/constants.php and configure it');
}


// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

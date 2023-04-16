<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@app/libs/assets/select2';

    public $css = [
        'select2.min.css',
        'select2.bootstrap5.min.css'
    ];

    public $js = [
        'select2.full.min.js'
    ];

    public $depends = [
        AppAsset::class
    ];
}

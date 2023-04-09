<?php

namespace app\libs\grid;

use yii\grid\SerialColumn;

class AppSerialColumn extends SerialColumn
{
    public $headerOptions = ['class' => 'text-center'];
    public $contentOptions = ['class' => 'text-center'];
}

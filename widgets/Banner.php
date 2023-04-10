<?php

namespace app\widgets;

use Yii;
use yii\bootstrap5\Widget;

class Banner extends Widget
{

    public $title;
    public $subtitle;
    public $image;

    public function run()
    {
        return $this->render('banner', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $this->image
        ]);
    }
}

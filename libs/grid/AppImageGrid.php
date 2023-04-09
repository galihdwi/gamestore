<?php

namespace app\libs\grid;

use yii\base\Widget;
use yii\helpers\Url;

class AppImageGrid extends Widget
{
    public $urlPath = '';
    public $activeDataProvider;

    public function init()
    {
        parent::init();

        if ($this->activeDataProvider === null) {
            throw new \yii\base\InvalidConfigException('The "activeDataProvider" property must be set.');
        }

        if (!$this->activeDataProvider instanceof \yii\data\ActiveDataProvider) {
            throw new \yii\base\InvalidConfigException('The "activeDataProvider" property must be an instance of yii\data\ActiveDataProvider.');
        }
    }

    public function run()
    {
        $content = "<div class=\"row\">";

        if ($this->activeDataProvider->getModels()) {
            foreach ($this->activeDataProvider->getModels() as $data) {
                $url = Url::to([$this->urlPath, 'id' => $data->id]);
                $content .= '<div class="col-6 col-sm-4 col-md-4 col-lg-3 p-1">';
                $content .= '<div class="square imageThumbnail clickCursor" style="background-image: url(\' ' . $url . ' \');" data-image="' . $url . '" data-id="' . $data->id . '"></div>';
                $content .= "</div>";
            }
        } else {
            $content .= '<div class="col-12">';
            $content .= '<div class="text-center">';
            $content .= '<div class="empty">No photos found.</div>';
            $content .= '</div>';
            $content .= "</div>";
        }



        $content .= "</div>";

        return $content;
    }
}

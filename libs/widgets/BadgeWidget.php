<?php

namespace app\models\table;

class BadgeWidget extends \yii\base\Widget
{
    public $model;
    public $attribute;
    public $options = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = $this->model;
        $attribute = $this->attribute;
        $options = $this->options;

        $value = $model->$attribute;

        $badge = '';
        if ($value == 1) {
            $badge = 'badge-success';
        } elseif ($value == 0) {
            $badge = 'badge-danger';
        }

        return '<span class="badge ' . $badge . '">' . $value . '</span>';
    }
}

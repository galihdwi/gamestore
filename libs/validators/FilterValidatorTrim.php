<?php

namespace app\libs\validators;

use yii\validators\FilterValidator;

class FilterValidatorTrim extends FilterValidator
{
    /*
    * Temporary fix bugs for https://github.com/yiisoft/yii2/pull/19539    
    */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if (!$this->skipOnArray || !is_array($value)) {
            $model->$attribute = call_user_func($this->filter, $this->filter !== 'trim' ? $value : ($value ?? ''));
        }
    }
}

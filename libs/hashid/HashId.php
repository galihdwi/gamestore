<?php

namespace app\libs\hashid;

use Hashids\Hashids;
use yii\base\Component;

class HashId extends Component
{
    private $_hashid;

    public $salt;
    public $minHashLength;
    public $alphabet;

    public function init()
    {
        $this->_hashid = new Hashids($this->salt, $this->minHashLength, $this->alphabet);
        parent::init();
    }

    public function encode()
    {
        return $this->_hashid->encode(...func_get_args());
    }

    public function decode($hash)
    {
        return $this->_hashid->decode($hash);
    }
}

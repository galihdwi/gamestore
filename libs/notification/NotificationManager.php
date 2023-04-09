<?php

namespace app\libs\notification;

/**
 * Class NotificationManager
 */

class NotificationManager
{
    protected $handlers = [];

    /**
     * NotificationManager constructor.
     */
    public function __construct($handlers = [])
    {
        $this->handlers = $handlers;
    }

    /**
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlers;
    }

    /**
     * @param array $handlers
     */
    public function addHandler(NotificationInterface $handler)
    {
        $this->handlers[] = $handler;
    }

    /**
     * @return mixed
     */
    public function trigger()
    {
        foreach ($this->handlers as $handler) {
            $handler->send();
        }
    }
}

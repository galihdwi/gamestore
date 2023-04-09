<?php

namespace app\libs\notification\type;

use app\libs\notification\NotificationInterface;
use Yii;

/**
 * Class MailNotification
 */
class MailNotification implements NotificationInterface
{
    protected $body;
    protected $subject;
    protected $to;
    protected $from;
    protected $cc;
    protected $bcc;

    /**
     * MailNotification constructor.
     */
    public function __construct($subject, $body, $to, $from, $cc = [], $bcc = [])
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->to = $to;
        $this->from = $from;
        $this->cc = $cc;
        $this->bcc = $bcc;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        // compose and send mail
        return Yii::$app->mailer->compose()
            ->setFrom($this->from)
            ->setTo($this->to)
            ->setCc($this->cc)
            ->setBcc($this->bcc)
            ->setSubject($this->subject)
            ->setHtmlBody($this->body)
            ->send();
    }
}

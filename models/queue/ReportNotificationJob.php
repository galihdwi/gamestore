<?php

namespace app\models\queue;

use app\libs\notification\NotificationManager;
use app\libs\notification\template\MailTemplate;
use app\libs\notification\template\WhatsappTemplate;
use app\libs\notification\type\MailNotification;
use app\libs\notification\type\WhatsappNotification;
use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class ReportNotificationJob extends BaseObject implements JobInterface
{
    public $user;
    public $appName;
    public $case_id;
    public $case_status;
    public $case_type;
    public $destination = []; // format is [ type:destination ] eg: email:dev@localhost or whatsapp:6281234567890

    public function execute($queue)
    {
        /**
         * init notification manager
         */
        $notificationManager = new NotificationManager();

        /**
         * add notification handler
         */
        foreach ($this->destination as $dst) {
            $explodeTypeAndDestination = explode(':', $dst);
            $notificationType = $explodeTypeAndDestination[0];
            $destination = $explodeTypeAndDestination[1];

            /**
             * check notification type
             */
            if ($notificationType == 'whatsapp') {
                /**
                 * Whatsapp notification
                 */
                $whatsappTemplate = new WhatsappTemplate();
                $whatsappNotif = new WhatsappNotification(
                    $destination,
                    $whatsappTemplate->getReportMsg($this->user, $this->appName, $this->case_id, $this->case_status, $this->case_type)
                );

                /**
                 * add handler to notification manager
                 */
                $notificationManager->addHandler($whatsappNotif);
            } else if ($notificationType == 'email') {
                /**
                 * Email notification
                 */
                $camelCaseStatus = ucwords($this->transactionStatus);

                $mailTemplate = new MailTemplate();
                $emailNotif = new MailNotification(
                    "Trasaksi {$camelCaseStatus}| {$this->appName}",
                    $mailTemplate->getReportMsg($this->user, $this->appName, $this->case_id, $this->case_status, $this->case_type),
                    $destination,
                    Yii::$app->params['mailAddress']['fromEmail'],
                    Yii::$app->params['mailAddress']['ccEmail'],
                    Yii::$app->params['mailAddress']['bccEmail']
                );

                /**
                 * add handler to notification manager
                 */
                $notificationManager->addHandler($emailNotif);
            } else {
                throw new \Exception('Notification type not found');
            }
        }

        /**
         * trigger notification
         */
        $notificationManager->trigger();
    }
}

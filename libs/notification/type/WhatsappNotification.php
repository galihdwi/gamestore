<?php

namespace app\libs\notification\type;

use app\libs\notification\NotificationInterface;
use Yii;

/**
 * Class WhatsappNotification
 */
class WhatsappNotification implements NotificationInterface
{
    protected $chatId;
    protected $apiUrl;
    protected $token;
    protected $body;

    /**
     * WhatsappNotification constructor.
     */
    public function __construct($chatId, $body)
    {
        $this->chatId = $chatId;
        $this->apiUrl = Yii::$app->params['whatsapp']['apiUrl'];
        $this->token = Yii::$app->params['whatsapp']['token'];
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        /**
         * @var $data array
         */
        $data = [
            'content' => $this->body,
        ];

        /**
         * @var $endpoint string match phone number or group id
         */
        if (preg_match('/^\+62|62|08[0-9]+$/i', $this->chatId)) {

            /**
             * @var $this->chatId string replace 08 to +628
             */
            if (preg_match('/^08[0-9]+$/i', $this->chatId)) {
                $this->chatId = preg_replace('/^08/', '+628', $this->chatId);
            }

            $endpoint = '/message';
            $data['phone'] = $this->chatId;
        } else {
            $endpoint = '/message/group';
            $data['group'] = $this->chatId;
        }

        /**
         * @var $url string
         */
        $url = $this->apiUrl . $endpoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "Authorization: {$this->token}"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        /**
         * @var $statusCode int true if 200
         */
        return $statusCode == 200;
    }
}

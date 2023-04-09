<?php

namespace app\libs\notification;

interface TemplateNotificationInterface
{
    public function getRegisterVerificationMsg($user, $appName, $otpCode);
    public function getForgotPasswordVerificationMsg($user, $appName, $otpCode);
    public function getSuccessRegisterMsg($user, $appName);
    public function getSuccessForgotPasswordMsg($user, $appName);
    public function getTransactionMsg($user, $appName, $transactionNumber, $transactionStatus, $notes);
    public function getTransactionMsgForAdmin($user, $appName, $transactionNumber, $transactionStatus, $notes);
}

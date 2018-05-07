<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;

class EIMSComponent extends Component
{

    private $encrypt_method = "AES-256-CBC";
    private $secret_key = 'estatefusionabcdefghijklmnopqrstuvwxyziv';
    private $secret_iv = 'estatefusionabcdefghijklmnopqrstuvwxyziv';

    public function encrypt($string)
    {
        $output = false;
        $key = hash('sha256', $this->secret_key);
        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $output = openssl_encrypt($string, $this->encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public function decrypt($string)
    {
        $output = false;
        $key = hash('sha256', $this->secret_key);
        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $this->encrypt_method, $key, 0, $iv);
        return $output;
    }

    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public function getLabel($class, $text)
    {
        return "<p class='$class'>$text</p>";
    }

    public function sendMail($model, $mailFilePathName, $mailSubject, $mailTo)
    {
//        return true;
        return Yii::$app->mailer
            ->compose([
                'html' => $mailFilePathName . '-html',
            ], [
                'model' => $model])
            ->setFrom(['no-reply@clickworldwide.com' => "Click World Wide"])
            ->setTo($mailTo)
            ->setSubject($mailSubject)
            ->send();
    }

    public function getProfilePic($id = '')
    {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
        $profile = \backend\models\UserDetails::find()->where(['user_id' => $id])->one();
        $profileImage = $profile->image;
        return $profileImage;
    }

    public function getRoleName($id = "")
    {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
        $roles = Yii::$app->authManager->getRolesByUser($id);
        if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = $this->getRole($id);

        return $role->description;
    }

    public function getRole($id = "")
    {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
        $roles = Yii::$app->authManager->getRolesByUser($id);
        if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);
        return $role;
    }

    public function getFullname()
    {
        $fullName = '';
        if (isset(Yii::$app->user->identity->profile)) {
            $fullName = Yii::$app->getUser()->getIdentity()->profile['name'];
        } else {
            $profile = \backend\models\UserDetails::find()->where(['user_id' => Yii::$app->user->getId()])->one();
            $fullName = $profile->first_name . ' ' . $profile->last_name;
        }

        if ($fullName !== null)
            return ucwords(strtoupper($fullName));

        return false;
    }

}

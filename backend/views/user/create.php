<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->params['description'] = 'Enter the required data and press create';
$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                'userDetails' => $userDetails,
                'teacherModel' => $teacherModel,
                'parentsModel' => $parentsModel,
                'studentModel' => $studentModel,
            ])
            ?>
    </div>
</div>

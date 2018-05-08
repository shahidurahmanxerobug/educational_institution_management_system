<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->params['description'] = 'Enter the required data and press create';
$this->title = Yii::t('app', 'Change Password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
            <?=
            $form->field($model, 'password', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-lock"></i>'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="form-group">
            <?=
            $form->field($model, 'password_repeat', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-lock"></i>'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="form-group pull-right">
            <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['class' => 'btn btn-warning']) ?>
            &nbsp;&nbsp;
            <a href="<?= Url::to(['index']) ?>" class='btn btn-danger'><i class="fa fa-undo"></i> <?= Yii::t('app', 'Cancel') ?></a>
            &nbsp;&nbsp;
            <?= Html::submitButton('<i class="fa fa-save"></i> ' . Yii::t('app', 'Change Password'), ['class' => 'btn btn-success']) ?>
            <div class='clearfix'></div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

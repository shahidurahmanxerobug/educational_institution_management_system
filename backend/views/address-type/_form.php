<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AddressType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'name', [
        'addon' => [
            'prepend' => [
                'content' => '<i class="fa fa-align-justify"></i>'
            ]
        ]
    ])->textInput(['maxlength' => true])
    ?>
    <hr>
    <div class="form-group pull-right">
        <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['class' => 'btn btn-warning btn-lg']) ?>
        &nbsp;&nbsp;
        <a href="<?= Url::to(['index']) ?>" class='btn btn-danger btn-lg'><i class="fa fa-undo"></i> <?= Yii::t('app', 'Cancel') ?></a>
        &nbsp;&nbsp;
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> ' . Yii::t('app', 'Create') : '<i class="fa fa-save"></i> ' . Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-success']) ?>
        <div class='clearfix'></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

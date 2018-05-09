<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Profession */
/* @var $form yii\widgets\ActiveForm */
?>
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
    <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['class' => 'btn btn-warning']) ?>
    &nbsp;&nbsp;
    <a href="<?= Url::to(['index']) ?>" class='btn btn-danger'><i class="fa fa-undo"></i> <?= Yii::t('app', 'Cancel') ?>
    </a>
    &nbsp;&nbsp;
    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> ' . Yii::t('app', 'Create') : '<i class="fa fa-save"></i> ' . Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    <div class='clearfix'></div>
</div>

<?php ActiveForm::end(); ?>

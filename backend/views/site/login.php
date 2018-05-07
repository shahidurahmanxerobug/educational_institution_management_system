<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;

$this->title = \Yii::$app->name . '| Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="userpic"><img src="/img/login-logo.png" alt="" ></div>
			<div class="panel-body">
				<h2 class="text-center">Please Sign In</h2>
				<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
					<fieldset>
                        <?= $form->field($model, 'username', [
                            'addon' => [
                                'prepend' => [
                                    'content' => '<i class="fa fa-user"></i>'
                                ]
                            ]
                        ])->textInput(['autofocus' => true, 'maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Username / Email']) ?>

                        <?= $form->field($model, 'password', [
                            'addon' => [
                                'prepend' => [
                                    'content' => '<i class="fa fa-lock"></i>'
                                ]
                            ]
                        ])->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Password']) ?>

                        <?php
                        $model->rememberMe = true;
                        echo $form->field($model, 'rememberMe')->widget(SwitchInput::classname(), [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                                'size' => 'small',
                                'onColor' => 'success',
                                'offColor' => 'danger',
                            ]
                        ]);
                        ?>
						<br/>
						<div class="form-group">
							<?= Html::submitButton("<i class='fa fa-key'></i> ".'Login', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
						</div>
					</fieldset>
					<div class="row">
					  <div class="col-md-6 "> <?= Html::a('Forgot password?', ['site/request-password-reset']) ?> </div>
						<div class="col-md-6 "> <?= Html::a('Back to Home', ['/']) ?> </div>
					
					</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
				

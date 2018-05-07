<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$this->title = \Yii::$app->name . '| Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="userpic"><img src="/img/default_profile.png" alt="" ></div>
			<div class="panel-body">
				<h2 class="text-center">Change Password</h2>
				<div class="row">
			    <div class="col-md-12" >
				    <?= \odaialali\yii2toastr\ToastrFlash::widget([
					        'options' => [
						    'positionClass' => 'toast-top-right'
					    ]
				    ]);?>
	
			    </div>
		</div>
				<?php $form = ActiveForm::begin(['id' => 'reset-password']); ?>
					<fieldset>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>                        
						<br/>
						  
						<br/>
						<div class="form-group">
							<?= Html::submitButton('Change Password', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
						</div>
					</fieldset>
					
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
				

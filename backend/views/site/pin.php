
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Yii::$app->name . '| Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="userpic"><img src="/img/default_profile.png" alt="" ></div>
			<div class="panel-body">
				<h2 class="text-center">Enter your PIN</h2>
				<div class="alert alert-info alert-fill">PIN has been sent to both mobile number and email address, enter that PIN to login</div>
    
				<?php $form = ActiveForm::begin(['action' =>['site/pin'],'id' => 'login-form']); ?>
					
					<fieldset>
						
						<input type="hidden" name="LoginForm[key]" value="<?= \Yii::$app->util->encrypt($model->user->email) ?>" />
						<?= $form->field($model, 'pin')->textInput(['autofocus' => true]) ?>
						<br/>
						<div class="form-group">
							<?= Html::submitButton('Verify PIN', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
						</div>
					</fieldset>
					<div class="row">
						<div class="col-md-6 "> <?= Html::a('Back to Home', ['/']) ?> </div>
					</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
				

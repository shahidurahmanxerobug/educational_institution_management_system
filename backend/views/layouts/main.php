<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use kartik\growl\Growl;
use kartik\growl\GrowlAsset;

AppAsset::register($this);
GrowlAsset::register($this);
date_default_timezone_set('Asia/Karachi');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(\Yii::$app->name . " | " . $this->title) ?></title>
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="loader">
    <h1 class="loadingtext">E. I. M. S<span>V-1.0</span></h1>
    <p><?= Yii::$app->name ?></p><br>
    <img src="/img/loader2.gif" alt="">
</div>

<div class="wrapper">
    <div class="navbar-default sidebar" >
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" > <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand" href="<?= Url::to(['/']) ?>">
                <p style="font-size: 2em" class="padding"> E. I. M. S</p>
            <!--    <img src="/img/logo-lr-small.png"/> -->
            </a>
		</div>
		<div class="clearfix"></div>
		<div class="sidebar-nav navbar-collapse">
            <!-- user profile pic -->
            <div class="userprofile text-center">
                <div class="userpic">
                    <?php
                    if (!empty(Yii::$app->util->profilePic)) {
                        $profileImage = Url::to('/' . Yii::$app->util->profilePic);
                    } else {
                        $profileImage = Url::to('@web/img/user.png');
                    }
                    ?>
                    <img src="<?= $profileImage ?>" alt="User Profile Image" class="userpicimg">
                    <a href="" class="btn btn-primary settingbtn">
                        <i class="fa fa-gear"></i>
                    </a>
                </div>
                <h3 class="username"><?= \Yii::$app->util->fullName; ?></h3>
                <p><?= \Yii::$app->util->roleName; ?></p>
            </div>
            <div class="clearfix"></div>
            <!-- user profile pic -->
			<?php 
				$view = \Yii::$app->urlManager->parseRequest(Yii::$app->request);
				//print_r( $view);
				$view = trim($view[0]); 
			?>
			<?= $this->render('_menu',['view'=>$view]); ?>
			
		</div>
	</div>
	<div id="page-wrapper">
		<div class="row">
			<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
				<button class="menubtn pull-left btn "><i class="glyphicon  glyphicon-th"></i></button>
				
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"> <a class="dropdown-toggle userdd" data-toggle="dropdown" href="javascript:void(0)">
						<div class="userprofile small ">
                            <span class="userpic">
                                <?php
                                if (!empty(Yii::$app->util->profilePic)) {
                                    $profileImage = Url::to('/' . Yii::$app->util->profilePic);
                                } else {
                                    $profileImage = Url::to('@web/img/user.png');
                                }
                                ?>
                                <img src="<?= $profileImage ?>" alt="Profile Image" class="userpicimg">
                            </span>
							<div class="textcontainer">
								<h3 class="username"><?= \Yii::$app->util->fullName; ?></h3>			
								<p><?= \Yii::$app->util->roleName; ?></p>
							</div>
						</div>
						<i class="caret"></i> </a>
						<ul class="dropdown-menu dropdown-user">
						  <li> <a href="socialprofile.html"><i class="fa fa-user fa-fw"></i> User Profile</a> </li>
						  <li> <a href="javascript:void(0)"><i class="fa fa-gear fa-fw"></i> Settings</a> </li>
						  <li> <a href="<?= Url::to(['/site/logout'])?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
						</ul>
					<!-- /.dropdown-user --> 
					</li>
				</ul>
			</nav>
		</div>
		<div class="row">
			<div class="col-md-12  header-wrapper" >
				<h1 class="page-header"><?= $this->title ?></h1>
				<p class="page-subtitle"><?= $this->params['description'] ?></p>
			</div>
		<!-- /.col-lg-12 --> 
		</div>
		<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<div class="row">
			<div class="col-md-12" >
                <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message): ?>
                    <?php
                    $typesArray = ['success'=>'success','error'=>'danger','warning'=>'warning'];
                    $titlesArray = ['success'=>'Success','error'=>'Error','warning'=>'Warning'];
                    $iconsArray = ['success'=>"fa-check",'error'=>"fa-times",'warning'=>"fa-warning"];

                    echo Growl::widget([
                        'type' => $typesArray[$key],
                        'title' => $titlesArray[$key],
                        'icon' =>  "fa " .$iconsArray[$key],
                        'body' => (!empty($message)) ? Html::encode($message) : 'Message Not Set!',
                        'showSeparator' => true,
                        'delay' => 1, //This delay is how long before the message shows
                        'pluginOptions' => [
                            'delay' => (!empty($message['duration'])) ? $message['duration'] : 5000, //This delay is how long the message shows for
                            'placement' => [
                                'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                                'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'center',
                            ],
                            'z_index' => '10600'
                        ]
                    ]);
                    ?>
                <?php endforeach; ?>
				<?= $content ?>
			</div>
		</div>
	</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
$js = <<< JS
	$(document).on('ready',function(){
		
	});
	
JS;

$this->registerJs($js);
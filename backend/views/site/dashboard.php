<?php
use yii\helpers\Url;

$this->params['heading'] = 'Dashboard';
$this->params['description'] = 'Dashboard Description';

$statusArray = ['success','blue','yellow','red','success','blue'];

?>
<div class='row'>
	<?php $i = 0; ?>
	<?php foreach($counts as $count) { ?>
		<?php if($i++ == 0 && !\Yii::$app->user->can('admin') &&  !\Yii::$app->user->can('support')) { 
			continue;
		} ?>
		<div class="col-lg-6 col-sm-6 col-xs-12">
			<div class="panel panel-<?= $statusArray[$i-1] ?>">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"> <i class="fa fa-tasks fa-2x"></i> </div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?= $count['count'] ?></div>
							<div><?= $count['status'] ?> &mdash; Tickets!</div>
						</div>
					</div>
				</div>
				<a href="<?= Url::to(['/cases']) ?>">
					<div class="panel-footer"> <span class="pull-left">View Details</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a> 
			</div>
		</div>

	<?php ; } ?>
</div>

<?php
use yii\widgets\ListView;
?>
<div style="padding-top:20px">&nbsp;</div>
	
<div class="row">
	<div class="col-xs-12  col-md-12">
		<?php \yii\widgets\Pjax::begin(['clientOptions' => ['method' => 'POST']]); ?>
		<div class="faqs">
			<?= 
				ListView::widget([
					'dataProvider' => $dataProvider,
					'itemView' => '_faqItem',
					'layout' => "{items}\n{pager}",
					'options' => [
						'tag' => 'div',
						'class' => 'panel-group',
						'id' => 'faqAccordian',
						'role'=>"tablist",
						'aria-multiselectable'=>"true"
					],
					'pager' => [
						'options' => ['class' => 'pager'],
						'nextPageLabel' => 'Next',
						'prevPageLabel' => 'Prev',
						'maxButtonCount' => 3,
					],
					'emptyText'=>'No Faqs'
				]); 
			?>
			
		</div><!-- /.reviews -->
		<?php \yii\widgets\Pjax::end(); ?>
	</div>
</div>
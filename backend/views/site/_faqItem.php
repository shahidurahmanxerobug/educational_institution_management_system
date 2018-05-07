<div class="panel">
	<div class="panel-heading" role="tab" id="headingOne3">
		<h4 class="panel-title"> 
			<a role="button" data-toggle="collapse" data-parent="#faqAccordian" href="#faq<?= $model->id ?>" aria-expanded="true" aria-controls="faq<?= $model->id ?>"> 
				<span class="fa  fa-comment-o icon"></span><?= $model->question ?><span class="fa fa-angle-down pull-right"></span> 
			</a> 
		</h4>
	</div>
	<div id="faq<?= $model->id ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne3">
	  <div class="panel-body">
		<p><?= $model->answer ?></p>
	  </div>
	</div>
</div>


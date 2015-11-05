<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php if(null!==(Yii::$app->session->getFlash('success'))): ?>
	<div class="col-md-12 notification-global-success p-all">
		<?= Yii::$app->session->getFlash('success'); ?>
		<span class="pull-right"><span class="glyphicon glyphicon-remove-sign hand-hover" id="close-notification-success"></span></span>
	</div>
<?php endif; ?>
<div class="col-md-3 translate-form" >	
	<legend>Translate Form</legend>
	<?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'english') ?>

	    <?= $form->field($model, 'chinese') ?>

	    <div class="form-group">
	        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	    </div>

	<?php ActiveForm::end(); ?>
</div>

<script>
	/** Close the notification bar */
	$('#close-notification-success').click(function(){
		console.log('test');
		$('.notification-global-success').fadeOut("slow");
	});
</script>
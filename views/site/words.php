<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<?php if(null!==(Yii::$app->session->getFlash('success'))): ?>
	<div class="col-md-12 notification-global-success p-all">
		<?= Yii::$app->session->getFlash('success'); ?>
		<span class="pull-right"><span class="glyphicon glyphicon-remove-sign hand-hover" id="close-notification-success"></span></span>
	</div>
<?php endif; ?>

<div class="col-md-3 translate-form m-top20" >	
	<legend>Translate Form</legend>
	<?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'english') ?>

	    <?= $form->field($model, 'chinese') ?>

	    <div class="form-group">
	        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	    </div>

	<?php ActiveForm::end(); ?>
</div>
<div class="col-md-9 word-list" >
	<table class="m-top20" width="100%" border="1">
		<tr>
			<th class="p-all" width="20%">English</th>
			<th class="p-all" width="70%">Chinese</th>
			<th class="p-all" width="10%">Actions</th>
		</tr>			

		<?php if(count($words)>0): ?>				
			<?php foreach($words as $word): ?>
				<tr>
					<td class="p-all"><?= $word->english ?></td>
					<td class="p-all">
						<?php 
							$chinese = $word->chinese;
							$l=mb_strlen($chinese);

							for($i=0;$i<$l;$i++):
							    $current_char = mb_substr($chinese,$i,1);

							    $symbols = (new \yii\db\Query())
					            ->select('id')
					            ->from('symbols')
					            ->where(["symbol"=>$current_char])
					            ->one();

					            ?>
					            	<div style="float:left; font-size:30px; margin: 15px">
					            		<?php if($symbols): ?>
					            			<div class="overlap" style="font-size:8px; margin-top:-20px; width:auto"><?= $symbols['id'] ?></div>
					            		<?php endif; ?>
					            		<?= $current_char ?>
					            	</div>	
				            <?php endfor; ?>
						<div class="clearfix"></div>

					</td>
					<td class="p-all text-center">						
						<span class="glyphicon glyphicon-pencil hand-hover"></span>
						<span class="glyphicon glyphicon-trash hand-hover"></span>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3" class="text-center"><h3>No words found.</h3></td>
			</tr>
		<?php endif; ?>

	</table>
</div>
<script>
	/** Close the notification bar */
	$('#close-notification-success').click(function(){
		console.log('test');
		$('.notification-global-success').fadeOut("slow");
	});
</script>
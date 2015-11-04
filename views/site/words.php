<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Chinese Vocab Application';
?>

<div>
	<input type="text" id="english-version" placeholder="English word">
	<input type="text" id="chinese-translation" placeholder="Chinese translation">
	<button class="btn btn-primary" id="add-word-btn">Add Word</button>
</div>

<script>
	$('#add-word-btn').click(function(){
		english = $('#english-version').val();
		chinese = $('#chinese-translation').val();
		window.location.replace('/site/addword/english/'+english+'/chinese/'+chinese);
	})
</script>
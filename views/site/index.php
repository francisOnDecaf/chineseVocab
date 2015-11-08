<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Chinese Vocab Application';
?>
<div class="site-index text-center">
    <h1>Chinese</h1>
    <div class="col-md-12" style="margin:20px auto; text-align: justify;">
        <div class="row">
            <div class="col-md-4">
                The characters below are ordered by their frequency of use. For example, this first page includes the top 200 most commonly used Chinese characters.
            </div>
            <div class="col-md-4">
                Knowing just 1,000 Chinese characters will enable you to understand approximately 90% of written communication. With 2,500 you'll understand around 98% of written Chinese, and knowing all the 4000 we have listed on these page will enable you to understand virtually 100%. With that, even a native Chinese would be considered literate.
            </div>
            <div class="col-md-4">
                Simplified characters are used in China, while traditional characters are used in Hong Kong and Taiwan. About 65% of the 4000 characters we cover here are exactly the same in both styles -- and many others are quite similar. Therefore, knowing one style would definitely help with learning the other.
            </div>
        </div>        
    </div>
    <br><br>    
        <div class="col-md-12 text-50 m-auto"> 
            <div class="row">  
                <div class="col-md-1">                    
                    <div class="col-md-1 overlap">
                            <?= Html::encode($symbols[$rand]['id']) ?>
                    </div>
                    <?= Html::encode($symbols[$rand]['symbol']) ?>
                </div>              
                <?php for($i=1; $i<11; $i++): ?>
                    <div class="col-md-1 box-invert">
                        <span class="text-20"><?= Html::encode($i) ?></span>
                    </div>
                <?php endfor; ?>
            </div>
            <?php $i=1; ?>
            <?php foreach($symbols as $symbol): ?>
                <?php if(($i%10)==1): ?>
                    <div class="row">
                        <div class="col-md-1 box-invert">
                            <span class="text-20"><?= Html::encode($i-1); ?></span>
                        </div>
                <?php endif; ?>
                
                <div class="col-md-1">
                    <div class="col-md-1 overlap">
                            <?= Html::encode($symbol['id']) ?>
                    </div>
                    <?= Html::encode($symbol['symbol']) ?>
                </div>

                <?php if(($i%10)==0): ?>
                        <div class="col-md-1">
                            &nbsp;
                        </div>
                    </div>
                <?php endif; ?>

            <?php $i++; ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>

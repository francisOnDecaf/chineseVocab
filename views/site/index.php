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
        <div class="col-md-12 text-20 m-auto">   
            <div class="row">   
                <div class="col-md-4">
                    <div class="box-invert col-md-12 p-all">
                        Symbol for the Instant
                    </div>                    
                    <div class="col-md-1 overlap" style="margin: 3px;">
                            <?= Html::encode($symbols[$rand_sym]['id']) ?>
                    </div>                
                    <?= Html::encode($symbols[$rand_sym]['symbol']) ?>    
                </div> 
                <div class="col-md-4">
                    <div class="box-invert col-md-12 p-all">
                        Word for the Instant
                    </div>
                    <?php if(isset($words[$rand_word]['english'])): ?>                  
                        <?= Html::encode($words[$rand_word]['english']) ?>
                        <div class="col-md-12 p-all" id="show_chinese_container" style="display:none">
                            <span><?= Html::encode($words[$rand_word]['chinese']) ?></span>
                        </div>
                        <div class="col-md-12 p-all" id="show_chinese">
                            <button class="btn btn-primary">Translate in Chinese</button>
                        </div>
                    <?php else: ?>
                        <span>No words added yet. <a href="/site/words">Add word</a></span>
                    <?php endif; ?>
                </div> 
                <div class="col-md-4"> 
                    <div class="box-invert col-md-12 p-all">
                        Chinese Word for the Instant
                    </div>         
                    <?php if(isset($words[$rand_word]['english'])): ?>                                                         
                        <?= Html::encode($words[$rand_word_c]['chinese']) ?>
                        <div class="col-md-12 p-all" id="show_english_container" style="display:none">
                            <span><?= Html::encode($words[$rand_word_c]['english']) ?></span>
                        </div> 
                        <div class="col-md-12 p-all" id="show_english">
                            <button class="btn btn-primary">Translate in Chinese</button>
                        </div>   
                    <?php else: ?>
                        <span>No words added yet. <a href="/site/words">Add word</a></span>
                    <?php endif; ?>                   
                </div>  
                <div class="col-md-1 overlap refresh" id="refresh_symbol" style="margin-left: 1099px;">
                    <span class="glyphicon glyphicon-refresh hand-hover"></span>
                </div>          
            </div>
            
        </div>                                      
    </div>
</div>

<script>
    $('#refresh_symbol').click(function(){
        location.reload();
    })

    $('#show_chinese').click(function(){
        $('#show_chinese_container').slideDown();
        $(this).slideUp();
    });

    $('#show_english').click(function(){
        $('#show_english_container').slideDown();
        $(this).slideUp();
    });
</script>

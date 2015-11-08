<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Translation;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $symbols = (new \yii\db\Query())
            ->select('symbol, id')
            ->from('symbols')
            ->all();

        $words = (new \yii\db\Query())
            ->select('*')
            ->from('translation')
            ->all();

        //Choose a symbol for an instant
        $symbol_size = count($symbols); 
        $words_size = count($words);        

        $rand_sym = rand(1, $symbol_size-1);
        $rand_word = rand(1, $words_size-1);
        $rand_word_c = rand(1, $words_size-1);
            
        return $this->render('index', [
            'symbols' => $symbols,
            'words' => $words,
            'rand_sym' => $rand_sym,
            'rand_word' => $rand_word,
            'rand_word_c' => $rand_word_c
        ]);
    }

    /**
     * Shows the symbol
     * @return array list of symbols
     */
    public function actionSymbols()
    {
        $symbols = (new \yii\db\Query())
            ->select('symbol, id')
            ->from('symbols')
            ->all();

        //Choose a symbol for an instant
        $symbol_size = count($symbols);

        //Uncomment this if you don't want to specify symbol size
        $symbol_size = 20;

        $rand = rand(1, $symbol_size-1);
            
        return $this->render('symbols', [
            'symbols' => $symbols,
            'rand' => $rand
        ]);
    }

    /**
     * If post request is present
     * stores the english and chinese pair
     * if not it shows a list of the words
     */
    public function actionWords()
    {
        $model = new Translation();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $model->save();
            \Yii::$app->getSession()->setFlash('success', 'The pair you entered has been added!');
            $model = new Translation();
        }
    
        
        $query = Translation::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $words = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
       

        return $this->render('words', [
            'model' => $model,
            'words' => $words,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Deletes a word 
     * @param  integer $id Word ID     
     */
    public function actionDeleteword($id)
    {
       $model = Translation::find()
       ->where(['id' => $id])
       ->one()
       ->delete();

       \Yii::$app->getSession()->setFlash('success', 'Successfully deleted!');
       $this->redirect('/site/words');
    }
}

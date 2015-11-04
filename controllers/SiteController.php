<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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

    /**
     * Shows the symbol
     * @return array list of symbols
     */
    public function actionIndex()
    {
        $symbols = (new \yii\db\Query())
            ->select('symbol, id')
            ->from('symbols')
            ->all();
            
        return $this->render('index', [
            'symbols' => $symbols,
        ]);
    }

    /**
     * Shows the list of words
     * @return array list of words
     */
    public function actionWords()
    {
        return $this->render('words');
    }

    /**
     * Add word function
     * @param text $english English word
     * @param text $chinese Chinese translation    
     */
    public function actionAddword($english, $chinese)
    {    
        $word = (new \yii\db\Query())
            ->insert('words', [
                'english' => $english,
                'chinese' => $chinese
            ]);

        return $this->render('words');
    }
}

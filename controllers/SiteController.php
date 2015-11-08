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

        //Choose a symbol for an instant
        $symbol_size = count($symbols);
        $rand = rand(1, $symbol_size);
            
        return $this->render('index', [
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
            'defaultPageSize' => 15,
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
}

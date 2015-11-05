<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Translation extends ActiveRecord
{
    public function rules()
    {
        return [
            [['english', 'chinese'], 'required'],
        ];
    }

    public static function tableName()
	{
	    return 'translation';
	}

	public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'english' => 'English',
            'chinese' => 'Chinese'            
        ];
    }
}

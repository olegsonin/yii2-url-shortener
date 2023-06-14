<?php

namespace common\models;

use yii\db\ActiveRecord;

class Link extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%links}}';
    }

    public function rules()
    {
        return [
          [['id', 'user_id'], 'integer'],
          [['url', 'user_id', 'hash'], 'required'],
          [['url', 'hash'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '',
            'user_id' => '',
            'url' => 'Url',
            'hash' => 'Short Link Hash',

        ];
    }
}

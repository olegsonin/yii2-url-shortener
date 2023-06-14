<?php

namespace frontend\models;

class Link extends \common\models\Link
{
    public function beforeSave($insert)
    {
        if ($this->hash == '') {
            $this->hash = hash('md5', $this->url);
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
<?php

namespace frontend\controllers;

use common\models\Link;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class LinksController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Link::find()->where(['user_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate(int $linkId)
    {
        $link = Link::findOne($linkId);
        $link->delete();

        return $this->goBack();
    }

    public function actionUpdate(int $linkId)
    {
        $link = Link::findOne($linkId);

        return $this->render('update', [
            'model' => $link
        ]);
    }

    public function actionDelete(int $linkId)
    {
        $link = Link::findOne($linkId);
        $link->delete();

        return $this->goBack();
    }
}

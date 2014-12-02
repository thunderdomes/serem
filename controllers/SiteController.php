<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Photo;
use yii\helpers\Url;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;


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

    public function cek($url){
        if(!Yii::$app->facebook->getSession()){
            if(isset($_GET['code'])){
                $helper = new FacebookRedirectLoginHelper(Url::to($url, true));
                try {
                    $session = $helper->getSessionFromRedirect();
                    Yii::$app->facebook->setSession($session);
                } catch(FacebookRequestException $ex) {
                  // When Facebook returns an error
                    throw $ex; 
                } catch(\Exception $ex) {
                  // When validation fails or other local issues
                    throw $ex;   
                }
            }
            else{
                $helper = new FacebookRedirectLoginHelper(Url::to($url, true));
                $loginUrl = $helper->getLoginUrl(['email','user_photos']);   
                return $this->redirect($loginUrl); 
            }
        }
        else{
            try {
                $user_profile = (new FacebookRequest(
                  Yii::$app->facebook->getSession(), 'GET', '/me'
                ))->execute()->getGraphObject(GraphUser::className());

                echo "Name: " . $user_profile->getName();

              } catch(FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();

              }   
        }
    }
    public function actionIndex()
    {
        return $this->render('0');
    }

    public function actionCreate()
    {
        return $this->render('1');
    }

    public function actionPick()
    {
        return $this->render('2');
    }

    public function actionWebcam()
    {
        if(isset($_POST['foto'])){
            Yii::$app->cloudinary;
            $a = \Cloudinary\Uploader::upload($_POST['foto'],['timestamp'=>time()]);
            $photo = new Photo();
            $photo->attributes = $a;
            $photo->save();
            return $this->redirect(['/site/edit','id'=>$photo->id]); 
        }
        return $this->render('webcam');
    }

    public function actionEdit($id)
    {

        Yii::$app->cloudinary;
        $model = Photo::findOne($id);
        if ($model == NULL)
            throw new HttpException(404, 'Model not found.');


        $url = cloudinary_url($model->public_id);
        return $this->render('3',[
            'url' => $url,
            'id'=>$id,
        ]);
    }

    public function actionRandom($id)
    {
        Yii::$app->cloudinary;
        $model = Photo::findOne($id);
        if ($model == NULL)
            throw new HttpException(404, 'Model not found.');

        echo cloudinary_url($model->public_id,[
            'effect'=>'grayscale'
        ]);
    }


    public function actionTest()
    {   
        $this->cek(['/site/test']);   
    }

    public function actionTest2()
    {
        Yii::$app->facebook->clearSession();
    }

    public function actionTest3(){
        Yii::$app->cloudinary;
        $a = \Cloudinary\Uploader::upload("http://www.hdwallpapersimages.com/wp-content/uploads/2014/01/Winter-Tiger-Wild-Cat-Images.jpg",['timestamp'=>time()]);
        $photo = new Photo();
        $photo->attributes = $a;
        $photo->save();
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}

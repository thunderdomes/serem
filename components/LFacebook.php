<?php
// app/components/Request.php
namespace app\components;
use Yii;
use yii\base\Component;
use Facebook\FacebookSession;

class LFacebook extends Component
{
	public $appId;
	public $secret;
	private $fbid;
	private $session;
    public function init()
    {
    	$session = Yii::$app->session->open();
    	FacebookSession::setDefaultApplication($this->appId, $this->secret);
    	parent::init();
    }
    public function getSession(){
    	if($this->session){
    		return $this->session;
    	}
    	else{
    		$_session = Yii::$app->session;
    		if(isset($_session['tokenfb'])  and $_session['tokenfb']){
    			$fbsession = new FacebookSession($_session['tokenfb']);
    			$this->setSession($fbsession);
    			return $fbsession;
    		}
    		else{
    			return false;
    		}
    	}
    }
    public function setSession($fbsession){
    	$this->session = $fbsession;
    	$_session = Yii::$app->session;
    	$_session['tokenfb'] = $fbsession->getToken();
    }
    public function clearSession(){
    	$this->session = false;
    	$_session = Yii::$app->session;
    	unset($_session['tokenfb']);
    }
}
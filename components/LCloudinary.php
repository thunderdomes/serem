<?php
// app/components/Request.php
namespace app\components;
use Yii;
use yii\base\Component;

class LCloudinary extends Component
{
	public $key;
	public $secret;
    public $cloud_name;
    public function init()
    {
    	$session = Yii::$app->session->open();
    	\Cloudinary::config(array( 
          "cloud_name" => $this->cloud_name, 
          "api_key" => $this->key, 
          "api_secret" => $this->secret,
        ));
    	parent::init();
    }
}
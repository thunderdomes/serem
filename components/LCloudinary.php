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
  private $pilihan = [
    'app\components\efek\Gray',
    'app\components\efek\Sepia',
    'app\components\efek\Saturation',
    'app\components\efek\Vibrance',
  ];
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

  public function acakEfek()
  {
    $index = rand(0,count($this->pilihan)-1);
    $class = $this->pilihan[$index];
    return (new $class())->createEfek();
  }
}
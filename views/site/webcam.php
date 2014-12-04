<?php
use yii\helpers\Url;
use app\assets\WebcamAsset;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $content string */

WebcamAsset::register($this);
?>
<body class="last">
<div class="wrapper foto">
	<header class="header">
		<div class="container">
			<a class="back" href="#">Back</a>
			<a class="logo" href="#" title="Nenek Siam"><img src="<?= Yii::getAlias('@web') ?>/images/logo-small2.png" alt=""></a>
			<h1>Foto Saya</h1>
		</div><!-- container -->
	</header><!-- header -->
	<div class="main">
		<div class="container">
			<?php $form = ActiveForm::begin([
			    'id' => 'web-form',
			    'options' => ['class' => 'form-horizontal'],
			]) ?>
				<div class="foto-saya" id="foto-webcam" style="height:500px;width:500px">
				</div>
				<div id="gallery"></div>
				<div class="nav-tab">
					<?= Html::submitButton('Lanjutkan Edit Foto') ?>
				</div>
			<?php ActiveForm::end() ?>
		</div>
	</div><!-- container -->
</div><!-- wrapper -->
<div class="content">
	<div class="container">
		<h3>Posting gambar seram-mu dan dapatkan: </h3>
		<h2>5 tiket Premiere.</h2>
		<p class="like">Like Facebook kami dan Twitter Nenek Siam. <a href="#"><img src="<?= Yii::getAlias('@web') ?>/images/fblike.png"></a> <a href="#"><img src="<?= Yii::getAlias('@web') ?>/images/follow.png"></a></p>
		<p class="share">Share foto seram kamu ke Facebook dan Twitter dengan mengklik tombol share di bawah foto.</p>
	</div><!-- container -->
</div><!-- gallery -->
</body>

<?php
	$this->registerJs('
		$(\'#foto-webcam\').photobooth().on("image",function( event, dataUrl ){
			$( "#gallery" ).html( \'<img src="\' + dataUrl + \'" >\' + \'<input name="foto" type="hidden" value="\'+ dataUrl +\'">\');
		});
		$("#web-form").submit(function(){
			if(!$("input[name=foto]").val()){
				return false;
			}
		});
	');
?>
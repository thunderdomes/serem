<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
?>
<body>
<div class="wrapper">
	<header class="header">
		<div class="container">
			<a class="logo" href="#" title="Nenek Siam"><img src="<?= Yii::getAlias('@web') ?>/images/logo.png" alt=""></a>
		</div><!-- container -->
	</header><!-- header -->
	<div class="container">
		<div class="main">
			<h2>Ubah Fotomu Jadi Foto Seram</h2>
			<div class="twocol">
				<div class="pic col">
					<img src="<?= Yii::getAlias('@web') ?>/images/pic-after.png" alt="">
					<div class="caption">
						<p>Foto Biasa</p>
					</div>
				</div><!-- pic -->
				<div class="pic col">
					<img src="<?= Yii::getAlias('@web') ?>/images/pic-after.png" alt="">
					<div class="caption">
						<p>Foto Biasa jadi Menyeramkan</p>
					</div>
				</div><!-- pic -->
			</div><!-- twopic -->
			<a href="<?= Url::to(['site/create']) ?>" class="btn btn-cta">Yuk Bikin Foto Seram</a>
			<p>*Dengan bikin foto seram, kamu bisa dapetin tiket film Nenek Siam</p>
		</div><!-- main -->
	</div><!-- container -->
</div><!-- wrapper -->
<div class="gallery">
	<div class="container">
		<h3>Foto Seram Terbaru</h3>
		<ul class="border">
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
			<li><a href="#">
				<img src="<?= Yii::getAlias('@web') ?>/images/gallery-1.jpg" alt="">
			</a></li>
		</ul>
	</div><!-- container -->
</div><!-- gallery -->
</body>
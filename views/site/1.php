<?php
use yii\helpers\Url;
?>
<body class="pilih-foto">
	<div class="container">
		<a class="logo" href="#" title="Nenek Siam"><img src="images/logo-small.png" alt=""></a>
		<div class="main">
			<p class="large">Pilih asal Fotomu</p>
			<div class="twocol">
				<a href="<?= Url::to(['site/pick']) ?>" class="facebook col">
					<span>
						<img src="images/icon-fb.png" alt="">
						<p>Foto Facebook</p>
					</span>
				</a>
				<a href="#" class="webcam col">
					<span>
						<img src="images/icon-cam.png" alt="">
						<p>Dari Webcam</p>
					</span>
				</a>
			</div>
		</div><!-- main -->
	</div><!-- container -->
</div><!-- wrapper -->
</body>
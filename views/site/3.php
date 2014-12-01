<?php
use yii\helpers\Url;
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
			<div class="nav-tab">
				<a href="#" id="acak">Acak Efek Foto</a>
			</div>
			<div class="foto-saya">
				<img id="foto" src="<?= $url ?>" alt="">
			</div>
			<div class="twocol">
				<div class="col">
					<a href="" class="btn btn-facebook"><span>Share ke Facebook</span></a>
					<a href="" class="btn btn-twitter"><span>Share ke Twitter</span></a>
				</div>
			</div>
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
		$("#acak").click(function(){
			var url = "'.Url::to(['site/random','id'=>$id]).'";
			$.get(url,{ },function(ret){
				$("#foto").attr("src",ret);
			});
		});
	');
?>
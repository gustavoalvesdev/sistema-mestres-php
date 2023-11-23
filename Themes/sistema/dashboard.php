<?php 
	include_once 'includes/config.php';
	$pages = 'dashboard';
?>
		<section class="content_left">
			<!-- Chama o menu da página-->
			<?php require 'includes/left.php';?>
		</section>
		
		<section class="content_right">
			<!-- Chama o cabeçalho da página-->
			<?php require 'includes/header.php';?>
	
			<article class="bgcolor-white">
				<img src="<?= $configBase ?><?= $themePathSite ?>/images/logo.png" alt="Logo da Empresa" title="Logo da Empresa">
				
				<?php 
					$read = $pdo->prepare("SELECT cliente_id, cliente_status FROM " . DB_CLIENTS . " WHERE cliente_status = :cliente_status");
					$read->bindValue(':cliente_status', 1);
					$read->execute();

					$lines = $read->rowCount();

					if ($lines < 10) {
						$count = '000' . $lines;
					} else if ($lines > 10 && $lines < 100) {
						$count = '00' . $lines;
					} else if ($lines >= 100 && $lines < 1000){
						$count = '0' . $lines;
					} else {
						$count = $lines;
					}
				?>

				<div class="divisor3 cards bgcolor-blue">
					<p class="color-white font-text-min text-center">Clientes</p>
					<p class="color-white text-center font-weight-max title"><?= $count ?></p>
				</div>

				<?php 
					$read = $pdo->prepare("SELECT fornecedor_id, fornecedor_status FROM " . DB_PROVIDERS . " WHERE fornecedor_status = :fornecedor_status");
					$read->bindValue(':fornecedor_status', 1);
					$read->execute();

					$lines = $read->rowCount();

					if ($lines < 10) {
						$count = '000' . $lines;
					} else if ($lines > 10 && $lines < 100) {
						$count = '00' . $lines;
					} else if ($lines >= 100 && $lines < 1000){
						$count = '0' . $lines;
					} else {
						$count = $lines;
					}
				?>
				
				<div class="divisor3 cards bgcolor-red">
					<p class="color-white font-text-min text-center">Fornecedores</p>
					<p class="color-white text-center font-weight-max title"><?= $count ?></p>
				</div>

				<?php 
					$read = $pdo->prepare("SELECT usuarios_id , usuarios_status FROM " . DB_USERS . " WHERE usuarios_status = :usuarios_status");  
					$read->bindValue(':usuarios_status', 1);
					$read->execute();

					$lines = $read->rowCount();

					if ($lines < 10) {
						$count = '000' . $lines;
					} else if ($lines > 10 && $lines < 100) {
						$count = '00' . $lines;
					} else if ($lines >= 100 && $lines < 1000){
						$count = '0' . $lines;
					} else {
						$count = $lines;
					}
				?>
				
				<div class="divisor3 cards bgcolor-green-light">
					<p class="color-white font-text-min text-center">Usuários</p>
					<p class="color-white text-center font-weight-max title"><?= $count ?></p>
				</div>
				
				<?php 
					$read = $pdo->prepare("SELECT produto_id, produto_status FROM " . DB_PRODUCTS . " WHERE produto_status = :produto_status");
					$read->bindValue(':produto_status', 1);
					$read->execute();

					$lines = $read->rowCount();

					if ($lines < 10) {
						$count = '000' . $lines;
					} else if ($lines > 10 && $lines < 100) {
						$count = '00' . $lines;
					} else if ($lines >= 100 && $lines < 1000){
						$count = '0' . $lines;
					} else {
						$count = $lines;
					}
				?>

				<div class="divisor3 cards bgcolor-orange">
					<p class="color-white font-text-min text-center">Produtos</p>
					<p class="color-white text-center font-weight-max title"><?= $count ?></p>
				</div>
				
				<?php 
					$read = $pdo->prepare("SELECT pedido_id, pedido_status FROM " . DB_ORDERS . " WHERE pedido_status = :pedido_status");
					$read->bindValue(':pedido_status', 1);
					$read->execute();

					$lines = $read->rowCount();

					if ($lines < 10) {
						$count = '000' . $lines;
					} else if ($lines > 10 && $lines < 100) {
						$count = '00' . $lines;
					} else if ($lines >= 100 && $lines < 1000){
						$count = '0' . $lines;
					} else {
						$count = $lines;
					}
				?>

				<div class="divisor3 cards bgcolor-green-dark">
					<p class="color-white font-text-min text-center">Pedidos</p>
					<p class="color-white text-center font-weight-max title"><?= $count ?></p>
				</div>
				
				<?php 
					$read = $pdo->prepare("SELECT pedido_id, pedido_despachado, pedido_status FROM " . DB_ORDERS . " WHERE pedido_status = :pedido_status AND pedido_despachado = :pedido_despachado");
					$read->bindValue(':pedido_status', 1);
					$read->bindValue(':pedido_despachado', 1);
					$read->execute();

					$lines = $read->rowCount();

					if ($lines < 10) {
						$count = '000' . $lines;
					} else if ($lines > 10 && $lines < 100) {
						$count = '00' . $lines;
					} else if ($lines >= 100 && $lines < 1000){
						$count = '0' . $lines;
					} else {
						$count = $lines;
					}
				?>

				<div class="divisor3 cards bgcolor-blue-dark">
					<p class="color-white font-text-min text-center">Despachados</p>
					<p class="color-white text-center font-weight-max title"><?= $count ?></p>
				</div>
				
				<div class="clear"></div>
			</article>
			
			<div class="clear"></div>
			<div class="espaco-min"></div>
		</section>
	<div class="clear"></div>
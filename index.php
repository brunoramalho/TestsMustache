<?php
	require 'mustache/src/Mustache/Autoloader.php';
	Mustache_Autoloader::register();
	$mustache = new Mustache_Engine;

	$dados = [
			'name' => 'teste',
			'in_ca' => [
					'taxed_value' => '423543'
				]
			];

	$tpl = $mustache->loadTemplate(file_get_contents('index.mustache'));

	print $tpl->render($dados);
?>
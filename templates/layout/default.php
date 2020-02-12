<?php
/**
 * @var \App\View\AppView $this
 */
$description = 'CakePHP Sandbox App';
?>
<!DOCTYPE html>
<html>
<head>
	<?php
echo $this->Html->charset();
?>
	<title>
		<?php echo h($description); ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

<?php
echo $this->Html->meta('icon');
echo $this->fetch('meta');
if (!empty($this->request->query['assets'])) {
	switch ($this->request->query['assets']) {
		case 'bootstrap-alpha':
			if (PHP_SAPI !== 'cli') {
				echo $this->AssetCompress->css('bootstrap-alpha');
			}
			echo $this->fetch('css');
		break;
		default:
			throw new \RuntimeException('Invalid asset type');
	}
} else {
	if (PHP_SAPI !== 'cli') {
		echo $this->AssetCompress->css('css-combined');
	}
	echo $this->fetch('css');
}
?>
</head>
<body>
 <div class="container">
	 <div class="row">
	<div class="col-xs-12">

	<?php
		$navigation = [
		];
	?>

	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
        <?php echo $this->element('navigation'); ?>
		</div>
    </div>

		<div id="header">
			<h1><?php
echo $description;
?> <b>v4</b></h1>
		</div>
		<div id="content">

			<?php

echo $this->Flash->render();
?>

			<div class="row">
			<?php
				echo $this->fetch('content');
			?>
			</div>

		</div>

		<hr />

		<div id="footer" class="">

		<div style="float: right;">Running on CakePHP <?php echo $this->Configure->version(); ?> / PHP <?php echo substr(phpversion(), 0, 3);?></div>

			Author: dereuromark | <a href="https://github.com/dereuromark/cakephp-sandbox">github.com/dereuromark/cakephp-sandbox</a> | <?php
echo $this->Html->linkReset('Contact', ['controller' => 'Contact', 'action' => 'index']);
?>
		</div>
	</div>
 </div>
 </div>

<?php if (!$this->Configure->read('debug')) {
	echo $this->element('stats');
} ?>

<?php echo $this->element('Feedback.sidebar');?>

<?php
if ($this->request->getQuery('assets')) {
	switch ($this->request->getQuery('assets')) {
		case 'bootstrap-alpha':
			if (PHP_SAPI !== 'cli') {
				echo $this->AssetCompress->script('js-combined');
			}
			break;
		default:
			throw new \RuntimeException('Invalid asset type');
	}
} else {
	if (PHP_SAPI !== 'cli') {
		echo $this->AssetCompress->script('js-combined');
	}
}
?>
<?php echo $this->fetch('script'); ?>
</body>
</html>

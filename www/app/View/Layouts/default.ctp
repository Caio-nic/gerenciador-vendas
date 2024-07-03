<?php
$cakeDescription = __d('cake_dev', 'Contact');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this->Html->meta('icon');
		echo $this->Html->css('header');
		
		// echo $this->Html->link('Home', ['View' => 'Pages', 'action' => '/']);
		// echo $this->Html->link('Contact', ['View' => 'Pages', 'action' => 'contact']);
	?>
</head>
<body>
	
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>
				<?php echo $this->element('sql_dump'); ?>
</body>
</html>

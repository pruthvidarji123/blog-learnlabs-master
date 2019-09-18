<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Infibeam </title>
	    <?php
	    	echo $this->Html->css('normalize.css');
	    	echo $this->Html->css('foundation.css');
	    	echo $this->Html->css('foundation-icons.css');
	    	echo $this->Html->css('main.css');
	    	echo $this->fetch('meta');
	    	echo $this->fetch('css');
	    ?>
	</head>
	<body>
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a> Infibeam </a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<ul class="right">
					
					<li> <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fi-clipboard-notes')) . " Blog",array('controller' => 'posts', 'action' => 'index'),array('escape' => false)); ?></li>
					<li> <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fi-power')) . " Login",array('controller' => 'users', 'action' => 'login'),array('escape' => false)); ?> </li>
					<li> <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fi-checkbox')) . " Register",array('controller' => 'users', 'action' => 'register'),array('escape' => false)); ?> </li>
				</ul>
			</section>
		</nav>
		<div id="page-wrapper" >
        	<?php echo $content_for_layout; ?>
      	</div>
      	<div class="alert-popup">
            <?php
                echo $this->Session->flash('error');
                echo $this->Session->flash('success');
            ?>
        </div>
		<?php
			echo $this->Html->script('vendor/jquery.js');
			echo $this->Html->script('app.js');
			echo $this->Html->script('foundation.min.js');
			echo $this->Html->script('foundation/foundation.alert.js');
			echo $this->fetch('script');
		?>
		<script>
			$(document).foundation();
    	</script>
	</body>
</html>
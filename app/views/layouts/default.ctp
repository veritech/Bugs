<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title><?php $title_for_layout ?></title>
		<?php
			print $this->Html->css('blueprint/screen.css');
			
			print $this->Html->css('default.css');
			
			print $scripts_for_layout;
		?>
	</head>
	<body>
		<div class="container">
			<div id="header" class="span-24 last">
				<h1 class="prepend-1 span-14">Buggin'</h1>
				<ul id="navigation" class="prepend-1 span-8 last">
					<li><?php print $this->Html->link('Dashboard','/users/dashboard')?></li>					
					<li><?php print $this->Html->link('Projects','/projects')?></li>
					<li><?php print $this->Html->link('Issues','/issues')?></li>
					<li><?php print $this->Html->link('Logout','/users/logout')?></li>
				</ul>
			</div>
			<div id="body" class=" prepend-1 span-22 append-1">
				<?php
					print $content_for_layout;
				?>
			</div>
			<div id="footer" class="span-24 last">
				Float-Right.co.uk 2010
			</div>
		</div>
		<?php print $this->element('sql_dump'); ?>
	</body>
</html>

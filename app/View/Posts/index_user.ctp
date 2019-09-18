<br/>
<br/>
<div class="row">
	<div class="large-10 medium-10 small-10 columns large-offset-1 medium-offset-1 small-offset-1">
		<h2> Your Blog posts </h2>
		<hr/>
		<?php
			foreach ($posts as $p) {
				echo "<div class='panel radius'>";
					echo "<h4>".$p['Post']['title']."<small> (".$p['Post']['created_at'].")</small></h4>";
					echo "<p style='text-align:justify'>".$p['Post']['body']."</p>";
					echo "<hr/>";
					echo "<div class='right'>";
						echo $this->Html->link('Delete post',array('controller'=>'posts','action'=>'delete_post',$p['Post']['id']),array('class'=>'button tiny radius alert'));
						echo "&nbsp;&nbsp;";
						echo $this->Html->link('Edit post',array('controller'=>'posts','action'=>'edit_post',$p['Post']['id']),array('class'=>'button tiny radius default'));
					echo "</div>";
					echo "<br/>";
				echo "</div>";
			}
		?>
	</div>
</div>
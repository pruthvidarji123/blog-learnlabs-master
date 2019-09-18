<br/>
<br/>
<div class="row">
	<div class="large-10 medium-10 small-10 columns large-offset-1 medium-offset-1 small-offset-1">
		
		<?php
			foreach ($posts as $p) {
				echo "<div class='panel radius'>";
					echo "<h3>".$p['Post']['title']."</h3>";
					echo "<span style='color:#979797'><i class='fi-torso'></i> ".$p['User']['name']." &nbsp;&nbsp;<i class='fi-calendar'></i> ".$p['Post']['created_at']."</span>";
					echo "<hr/>";
					echo "<p style='text-align:justify'>".$p['Post']['body']."</p>";
					
					
					echo "<br/>";
				echo "</div>";
			}
		?>
	</div>
</div>
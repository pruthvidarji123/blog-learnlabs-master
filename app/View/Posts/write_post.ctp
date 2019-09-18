<br/>
<br/>
<div class="row">
	<div class="large-10 medium-10 small-10 columns large-offset-1 medium-offset-1 small-offset-1">
		<h2> New post </h2>
		<?php
			echo $this->Form->create('Post',array('controller'=>'posts','action'=>'write_post'));
			echo $this->Form->input('title',array(
				'placeholder'=>'title',
				'label'=>false,
				'type'=>'text',
				'required'
			));
			echo $this->Form->input('body',array(
				'placeholder'=>'Post body',
				'label'=>false,
				'type'=>'textarea',
				'required'
			));
			echo $this->Form->input('user_id',array(
				'type'=>'hidden',
				'div'=>false,
				'value'=>$user['User']['id']
			));
			echo $this->Form->input('Submit',array(
				'type'=>'submit',
				'div'=>false,
				'label'=>false,
				'class'=>'button small radius'
			));

			echo $this->Form->end();
		?>
	</div>
</div>
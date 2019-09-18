<br/>
<br/>
<div class="row">
	<div class="large-5 medium-6 small-8 colums medium-offset-3 small-offset-2 large-offset-4 panel">
		<h3> New user | Registration </h3>
		<hr/>
		<?php
			echo $this->Form->create('User',array('controller'=>'users','action'=>'register'));
			echo $this->Form->input('name',array(
				'placeholder'=>'Name',
				'label'=>false,
				'type'=>'text',
				'required'
			));
			echo $this->Form->input('username',array(
				'placeholder'=>'Email',
				'label'=>false,
				'type'=>'email',
				'required'
			));
			echo $this->Form->input('password',array(
				'placeholder'=>'Password',
				'label'=>false,
				'type'=>'password',
				'required'
			));
			echo $this->Form->input('is_active',array(
				'type'=>'hidden',
				'div'=>false,
				'value'=>0
			));
			echo $this->Form->input('Register',array(
				'type'=>'submit',
				'div'=>false,
				'label'=>false,
				'class'=>'button expand small radius'
			));

			echo $this->Form->end();
		?>
	</div>
</div>
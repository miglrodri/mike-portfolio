<h1 class="center">Entre na sua conta</h1>

<?php echo form_open('login/submit', array('class' => 'page-form')); ?>

<?php echo validation_errors('<p class="error">','</p>'); ?>

<p>
	<label for="email" class="sr-only">E-mail: </label>
	<?php echo form_input(array('name' => 'email', 'value' => set_value('email'), 'class' => 'form-control', 'autofocus' => null, 'placeholder' => 'Endereço de email')); ?>
</p>

<p>
	<label for="password" class="sr-only">Password: </label>
	<?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Palavra passe')); ?>
</p>

<p class="center">
	<?php echo form_submit(array('class' => 'submit-button btn btn-lg button', 'name' => 'submit'),'Entrar'); ?>
</p>

<?php echo form_close(); ?>

<p class="center">
	<?php echo anchor('signup','Não tem uma conta? Crie uma nova'); ?>
</p>

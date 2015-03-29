<h1 class="center">Crie a sua conta grátis</h1>

<div class="form-container">

<?php echo form_open('signup/submit', array('class' => 'page-form')); ?>

<?php echo validation_errors('<p class="error">','</p>'); ?>

<p>
	<label for="email" class="sr-only">E-mail: </label>
	<?php echo form_input(array('name' => 'email', 'value' => set_value('email'), 'class' => 'form-control', 'autofocus' => null, 'placeholder' => 'Endereço de email')); ?>
</p>

<p>
	<label for="password" class="sr-only">Password: </label>
	<?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Palavra passe')); ?>
</p>
<p>
	<label for="passconf" class="sr-only">Confirm Password: </label>
	<?php echo form_password(array('name' => 'passconf', 'id' => 'passconf', 'class' => 'form-control', 'placeholder' => 'Confirme a palavra passe')); ?>
</p>

<p class="center">
	<?php echo form_submit(array('class' => 'submit-button btn btn-lg button', 'name' => 'submit'),'Criar conta'); ?>
</p>

<?php echo form_close(); ?>

<p class="center">
	<?php echo anchor('login','Já tem uma conta? Entre na sua conta'); ?>
</p>

</div>
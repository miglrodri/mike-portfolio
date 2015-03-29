<h1 class="title uppercase"><a href="<?= site_url() ?>/dashboard">Início</a> / <a href="<?= site_url() ?>/dashboard/cars/<?= $carId ?>"><i class="fa fa-car"></i> <?= $carName ?></a> / Abastecimento</h1>

<?php echo form_open('backend/items/submit', array('class' => 'edit-item-form')); ?>

<?php echo validation_errors('<p class="error">','</p>'); ?>

<p>
	<label for="date">Data de abastecimento: </label>
      	<?php echo form_input(array('name' => 'date', 'id' =>'input-additem-date', 'class' => 'form-control', 'value' => $item['date'], 'placeholder' => '2015-03-01 20:20:20')); ?>
        <span id="helpBlock" class="help-block"><i class="fa fa-info"></i> Formato correcto: 2015-03-01 20:20:20</span>
</p>

<p>
	<label for="kilometers">Kilometragem registada: </label>
	    <div class="input-group input-kilometers">
	      	<div class="input-group-addon">Km</div>
	      	<?php echo form_input(array('name' => 'kilometers', 'value' => $item['kilometers'], 'id' =>'input-additem-kilometers', 'autofocus' => null, 'class' => 'form-control', 'placeholder' => 'Exemplo: 56080')); ?>
	       	<span id="helpBlock" class="help-block"></span>
       	</div>
</p>

<p>
	<label for="liters">Nr de litros do abastecimento: </label>
      	<div class="input-group input-liters">
	      	<div class="input-group-addon">Litros</div>
	      	<?php echo form_input(array('name' => 'liters', 'value' => $item['liters'], 'id' =>'input-additem-liters', 'class' => 'form-control', 'placeholder' => 'Exemplo: 24.3')); ?>
	      	<span id="helpBlock" class="help-block"></span>
      	</div>
</p>

<p>
	<label for="price">Valor pago pelo abastecimento: </label>
      	<div class="input-group input-price">
	      	<div class="input-group-addon">€</div>
	      	<?php echo form_input(array('name' => 'price', 'value' => $item['price'], 'id' =>'input-additem-price', 'class' => 'form-control', 'placeholder' => 'Exemplo: 20')); ?>
	      	<span id="helpBlock" class="help-block"></span>
      	</div>
</p>

<input class="input-editcar-hidden-id" type="hidden" name="id" value="<?= $item['id'] ?>" />
<input class="input-editcar-hidden-carid" type="hidden" name="carId" value="<?= $item['carId'] ?>" />

<p>
	<?php echo form_submit(array('class' => 'submit-button btn btn-lg edit-item-button', 'name' => 'submit'),'Editar'); ?>
</p>

<?php echo form_close(); ?>


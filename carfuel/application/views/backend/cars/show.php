<?php $car = $cars[0]?>

<h1 class="title uppercase"><a href="<?= site_url() ?>/dashboard">Início</a> / <i class="fa fa-car"></i> <?= $car['name'] ?> <a data-toggle="modal" data-target=".editcar-modal" class="show-car" href="#"> <i class="fa fa-cog"></i></a></h1>



<!-- modal para editar carro -->
<div class="modal editcar-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title uppercase" id="myModalLabel"><?= $car['name'] ?> <button type="button" class="btn btn-sm btn-warning button-deletecar"><i class="fa fa-trash-o"></i></button></h4>
      </div>

      <div class="modal-body">
      	<label for="date">Novo nome: </label>
        <?php echo form_input(array('name' => 'name', 'id' =>'input-editcar', 'class' => 'form-control', 'value' => $car['name'], 'placeholder' => 'Marca e modelo do carro')); ?>
        <input class="input-editcar-hidden" type="hidden" name="id" value="<?= $car['id'] ?>" />
        <input class="input-editcar-hidden-name" type="hidden" name="old_name" value="<?= $car['name'] ?>" />

        <span id="helpBlock" class="help-block"><i class="fa fa-info"></i> Exemplo: Volkswagen Golf 2 1990</span>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary button-editcar">Editar</button>
      </div>
    </div>
  </div>
</div>
<!-- end of modal para editar carroX -->

<?php if (count($car['items']) > 0): ?>

<div class="row car-entry">
	<div class="col-sm-12 car-info">
		<p><i class="fa fa-calculator"></i> Consumo médio: <?php echo ($car['fuel_consumption'] != -1 ? number_format($car['fuel_consumption'],2).' l/100km' : 'Não tem abastecimentos suficientes.'); ?> </p>
	</div>
</div>


<div class="row car-entry">
    <div class="col-sm-12">
<table class="table table-bordered cars-table">
	<tr>
		<td class="col-md-1 center">Editar</td>
		<td class="col-md-3  hidden-xs">Data</td>
		<td class="col-md-3">Kilometros</td>
		<td class="col-md-2">Litros</td>
		<td class="col-md-3">Pago</td>
	</tr>

	<!-- item information -->
		<?php foreach ($car['items'] as $item_key => $item): ?>

		<tr>
			<td class="col-md-1 center"><a class="edit-item" href="<?= site_url() ?>/dashboard/cars/<?= $item['carId'] ?>/item/<?= $item['id'] ?>"> <i class="fa fa-cog"></i></a></td>
			<td class="col-md-3 hidden-xs"><?= $item['date'] ?></td>
			<td class="col-md-3"><?= $item['kilometers'] ?> km</td>
			<td class="col-md-2"><?= $item['liters'] ?> l</td>
			<td class="col-md-3"><?= $item['price'] ?> €</td>
		</tr>

		<?php endforeach; ?>
	<!-- enf of item information -->

	<tr>
		<td class="col-md-1 hidden-xs"></td>
		<td class="col-md-3">Totais</td>
		<td class="col-md-3"><?= $car['total_kilometers']; ?> km</td>
		<td class="col-md-2"><?= $car['total_liters']; ?> l</td>
		<td class="col-md-3"><?= $car['total_price']; ?> €</td>
	</tr>
</table>
    </div>
</div>

<?php else: ?>

	<p>Ainda não tem informação sobre abastecimentos para o <?= $car['name'] ?>.</p>

<?php endif; ?>

<div class="row">
	<div class="col-sm-3">
		<a data-toggle="modal" data-target=".additem-modal" class="btn btn-lg button add-item" href="#"><i class="fa fa-plus"></i> Adicionar abastecimento</a>
	</div>
</div>


<!-- Modal para criar abastecimento -->
<div class="modal additem-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adicionar novo abastecimento</h4>
      </div>
      <div class="modal-body">

      	<label for="date">Data de abastecimento: </label>
        <?php $now = new DateTime(); ?>
      	<?php echo form_input(array('name' => 'date', 'id' =>'input-additem-date', 'class' => 'form-control', 'value' => $now->format('Y-m-d H:i:s'), 'placeholder' => '2015-03-01 20:20:20')); ?>
        <span id="helpBlock" class="help-block"><i class="fa fa-info"></i> Formato correcto: 2015-03-01 20:20:20</span>
    	
	    <label for="kilometers">Kilometragem registada: </label>
	    <div class="input-group input-kilometers">
	      	<div class="input-group-addon">Km</div>
	      	<?php echo form_input(array('name' => 'kilometers', 'id' =>'input-additem-kilometers', 'class' => 'form-control', 'placeholder' => 'Exemplo: 56080')); ?>
	       	<span id="helpBlock" class="help-block"></span>
       	</div>

      	<label for="liters">Nr de litros do abastecimento: </label>
      	<div class="input-group input-liters">
	      	<div class="input-group-addon">Litros</div>
	      	<?php echo form_input(array('name' => 'liters', 'id' =>'input-additem-liters', 'class' => 'form-control', 'placeholder' => 'Exemplo: 24.3')); ?>
	      	<span id="helpBlock" class="help-block"></span>
      	</div>

      	<label for="price">Valor pago pelo abastecimento: </label>
      	<div class="input-group input-price">
	      	<div class="input-group-addon">€</div>
	      	<?php echo form_input(array('name' => 'price', 'id' =>'input-additem-price', 'class' => 'form-control', 'placeholder' => 'Exemplo: 20')); ?>
	      	<span id="helpBlock" class="help-block"></span>
      	</div>

      	<input class="additem-hidden" type="hidden" name="id" value="<?= $car['id']?>" />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary button-additem">Adicionar</button>
      </div>
    </div>
  </div>
</div>
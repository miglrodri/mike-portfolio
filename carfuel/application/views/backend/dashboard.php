<!-- Quando tem carros! mostra lista de carros e ultimas 3 entradas para cada 1 -->
<h1 class="title uppercase"><a href="<?= site_url() ?>/dashboard">Início</a> / Carros</h1>

<?php foreach ($cars as $key => $car): ?>
	<div class="row car-entry">
		<div class="col-sm-12 car-title uppercase">
			<p><a class="edit-car" href="<?= site_url() ?>/dashboard/cars/<?= $car['id'] ?>">
					<i class="fa fa-car"></i> <?= $car['name'] ?>
				</a></p>
		</div>
	</div>

	<?php if (count($car['items']) > 0): ?>

	<div class="row car-entry">
		<div class="col-sm-12 car-info">
			<p><i class="fa fa-calculator"></i> Consumo médio: <?php echo ($car['fuel_consumption'] != -1 ? number_format($car['fuel_consumption'],2).' l/100km' : 'Não tem abastecimentos suficientes.'); ?> </p>
		</div>
	</div>


	<table class="table table-bordered cars-table">
		<tr>
			<td class="col-md-1"></td>
			<td class="col-md-2">Nr de abastecimentos</td>
			<td class="col-md-3">Kilometragem (km)</td>
			<td class="col-md-3">Nr de litros (l)</td>
			<td class="col-md-3">Valor pago (€)</td>
		</tr>

		<tr>
			<td class="col-md-1">Totais</td>
			<td class="col-md-2"><?= count($car['items']); ?></td>
			<td class="col-md-3"><?= $car['total_kilometers']; ?> km</td>
			<td class="col-md-3"><?= $car['total_liters']; ?> l</td>
			<td class="col-md-3"><?= $car['total_price']; ?> €</td>
		</tr>
	</table>

	<?php else: ?>

		<p>Ainda não tem informação sobre abastecimentos para o <?= $car['name'] ?>.</p>

	<?php endif; ?>

	<div class="row">
		<div class="col-sm-3">
			<a class="btn btn-lg button add-item" href="<?= site_url() ?>/dashboard/cars/<?= $car['id'] ?>"><i class="fa fa-wrench"></i> Gerir abastecimentos</a>
		</div>
	</div>


	<hr>


<?php endforeach; ?>


<!-- Botão para adicionar carro -->
<div class="row">
	<div class="col-sm-3">
		
		<button type="button" class="btn btn-lg button add-car button-modal-addcar" data-toggle="modal" data-target=".addcar-modal">
		 	<i class="fa fa-plus"></i> Adicionar novo carro
		</button>
	</div>
</div>


<!-- Modal para adicionar carro -->
<div class="modal addcar-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adicionar novo carro</h4>
      </div>
      <div class="modal-body">
        <?php echo form_input(array('name' => 'name', 'id' =>'input-addcar', 'class' => 'form-control', 'placeholder' => 'Marca e modelo do carro')); ?>
        <span id="helpBlock" class="help-block"><i class="fa fa-info"></i> Exemplo: Volkswagen Golf 2 1990</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary button-addcar">Adicionar</button>
      </div>
    </div>
  </div>
</div>

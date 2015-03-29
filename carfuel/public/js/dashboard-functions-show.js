// code for editing car!
$('.editcar-modal .button-editcar').on('click', function () {
	$('.editcar-modal .modal-body .error').hide();
	$('.editcar-modal .modal-body').removeClass('has-error');
		//console.log('addcar was clicked');
		//console.log($('#input-addcar').val().length);
		var car_name = $('#input-editcar').val();
		var car_id = $('.input-editcar-hidden').val();
		var car_old_name = $('.input-editcar-hidden-name').val();

		if ($('.editcar-modal #input-editcar').val().length > 0) {
			console.log('vai chamar o método para editar o carro: '+car_name + ' e com id: '+ car_id);
			//$('.addcar-modal .cancel').hide();

			if (car_old_name != car_name) {
				$.ajax({
				url: '/carfuel/index.php/backend/cars/edit',
				method: "POST",
				data: {'name' : car_name, 'id' : car_id},
				success: function (data) {
					//console.log('data: '+JSON.stringify(data));
					console.log('edited:'+ data.name);
					$('.editcar-modal').modal('hide');
					$('.editcar-modal .modal-body #input-editcar').val('');
					location.reload();
				},
				error: function (error) {
					console.log('error: '+error);
				}
				});
			}
			else {
				// nome não foi editado
				console.log('same name');
				$('.editcar-modal').modal('hide');
				$('.editcar-modal .modal-body #input-editcar').val('');
			}

		} else {
			//console.log('dá erro porque não pode ter nome vazio!');
			$('.editcar-modal .modal-body').addClass('has-error');
			$('.editcar-modal #input-addcar').focus();
		$('.editcar-modal #input-addcar').after('<p class="error text-warning">O nome não pode estar vazio</p>');
		}
		
});

// code for delete car!
$('.editcar-modal .button-deletecar').on('click', function () {
	$('.editcar-modal .modal-body .error').hide();
	$('.editcar-modal .modal-body').removeClass('has-error');
		//console.log('addcar was clicked');
		//console.log($('#input-addcar').val().length);
		var car_id = $('.input-editcar-hidden').val();

	console.log('vai chamar o método para apagar o carro com id: '+ car_id);
	//$('.addcar-modal .cancel').hide();
	$.ajax({
		url: '/carfuel/index.php/backend/cars/delete',
		method: "POST",
		data: {'id' : car_id},
		success: function (data) {
			//console.log('data: '+JSON.stringify(data));
			console.log('deleted:'+ data.name);
			$('.editcar-modal').modal('hide');
			$('.editcar-modal .modal-body #input-editcar').val('');
            //alert(location);
			location.reload(true);
		},
		error: function (error) {
			console.log('error: '+error);
		}
	});
		
});

// code for adding new item!
$('.additem-modal .button-additem').on('click', function () {
	$('.additem-modal .modal-body .error').hide();
	$('.additem-modal .modal-body').removeClass('has-error');
		//console.log('addcar was clicked');
		//console.log($('#input-addcar').val().length);
		var car_id = $('.additem-modal .additem-hidden').val();
		var errors = false;

		var date = $('.additem-modal #input-additem-date');
		var kilometers = $('.additem-modal #input-additem-kilometers');
		var liters = $('.additem-modal #input-additem-liters');
		var price = $('.additem-modal #input-additem-price');

		if (!price.val().length > 0) {
			errors =  true;
			price.addClass('has-error');
			price.focus();
		$('.additem-modal .input-price').after('<p class="error text-warning">Este campo é obrigatório</p>');
		}
		if (!liters.val().length > 0) {
			errors =  true;
			liters.addClass('has-error');
			liters.focus();
		$('.additem-modal .input-liters').after('<p class="error text-warning">Este campo é obrigatório</p>');
		}
		if (!kilometers.val().length > 0) {
			errors =  true;
			kilometers.addClass('has-error');
			kilometers.focus();
		$('.additem-modal .input-kilometers').after('<p class="error text-warning">Este campo é obrigatório</p>');
		}
		if (!date.val().length > 0) {
			errors =  true;
			date.addClass('has-error');
			date.focus();
		date.after('<p class="error text-warning">Este campo é obrigatório</p>');
		}

		if (!errors) {
			$.ajax({
			url: '/carfuel/index.php/backend/items/create',
			method: "POST",
			data: {'carId' : car_id, 'date' : date.val(), 'kilometers' : kilometers.val(), 'liters' : liters.val(), 'price' : price.val()},
			success: function (data) {
				//console.log('data: '+JSON.stringify(data));
				console.log('added item km:'+ data.kilometers);
				$('.additem-modal').modal('hide');
				date.val('');
				kilometers.val('');
				liters.val('');
				price.val('');
				location.reload();
			},
			error: function (error) {
				console.log('error: '+error);
			}
		});
		}  			
});
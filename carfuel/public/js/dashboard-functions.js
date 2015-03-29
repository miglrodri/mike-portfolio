// code for adding new car!
$('.addcar-modal .button-addcar').on('click', function () {
	$('.addcar-modal .modal-body .error').hide();
	$('.addcar-modal .modal-body').removeClass('has-error');
		//console.log('addcar was clicked');
		//console.log($('#input-addcar').val().length);
		var car_name = $('#input-addcar').val();
		if ($('.addcar-modal #input-addcar').val().length > 0) {
			//console.log('vai chamar o método para criar o carro: '+car_name);
			//$('.addcar-modal .cancel').hide();
			$.ajax({
			url: '/carfuel/index.php/backend/cars/create',
			method: "POST",
			data: {'name' : car_name},
			success: function (data) {
				//console.log('data: '+JSON.stringify(data));
				console.log('added:'+ data.name);
				$('.addcar-modal').modal('hide');
				$('.addcar-modal .modal-body #input-addcar').val('');
				location.reload();
			},
			error: function (error) {
				console.log('error: '+error);
			}
		});
		} else {
			//console.log('dá erro porque não pode ter nome vazio!');
			$('.addcar-modal .modal-body').addClass('has-error');
			$('.addcar-modal #input-addcar').focus();
		$('.addcar-modal #input-addcar').after('<p class="error text-warning">O nome não pode estar vazio</p>');
		}
		
});

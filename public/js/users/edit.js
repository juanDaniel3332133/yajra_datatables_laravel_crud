const UpdateUserModule = (() => {

	const _modal = $('#editUserModal');
	
	const showModal = (event) => {

		event.preventDefault();

		const url = $(event.target).attr('href');

		$.get(url, html => {
			_modal.empty()
				  .append(html)
				  .modal('show');
		});
	}

	const previewImage = (event) => {

	  let image = event.target.files[0];
	  
	  const reader = new FileReader();
	  
	  reader.readAsDataURL(image); 
	  
	  reader.onload = (_event) => $('#newUserImage').attr('src', reader.result);
	}

	const sendForm = (event) => {

		event.preventDefault();

		if ($('#sendUpdateUserFormBtn').hasClass('disabled'))
			return;

		$('#sendUpdateUserFormBtn').addClass('disabled');

		const form = event.target,
				data = new FormData(form);

		$.ajax({
			url: $(form).attr('action'),
			method: $(form).attr('method'),
			data: data,
			processData: false,
			contentType: false,
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: response => _handleResponse(response),
			error: error => _handleError(error),
			complete: () => $('#sendUpdateUserFormBtn').removeClass('disabled')
		});
	}

	const _handleResponse = (response) => {

		let action = () => {
			_modal.modal('hide');
			UsersTableModule.reload();
		};

		swal.fire("Exito!", response.message, "success")
			.then(() => action())
			.catch(() => action());
	}

	const _handleError = (_error) => {

		const errors = _error.responseJSON.errors;

		Object.values(errors).forEach(error => toastr.error(error,'Campo requerido'));
	}

	return {
		showModal: showModal,
		previewImage: previewImage,
		sendForm: sendForm
	};

})();

/* events */

$(document).on('click','.editUser', UpdateUserModule.showModal);

$('#editUserModal').on('change','#newPhotoInput', UpdateUserModule.previewImage);

$(document).on('submit','#updateUserForm', UpdateUserModule.sendForm);


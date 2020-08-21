const CreateUserModule = (() => {

	const _modal = $('#createUserModal');

	const showModal = () => {

		$.get('/users/create', html => {

			_modal.empty()
				 .append(html)
				 .modal('show');
		});
	}

	const previewImage = (event) =>
	{
	  let image = event.target.files[0];
	  
	  const reader = new FileReader();
	  
	  reader.readAsDataURL(image); 
	  
	  reader.onload = (_event) => $('#userImage').attr('src', reader.result);
	}

	const sendForm = (event) =>
	{
		event.preventDefault();

		if ($('#sendCreateUserFormBtn').hasClass('disabled'))
			return;

		$('#sendCreateUserFormBtn').addClass('disabled');

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
			complete: () => $('#sendCreateUserFormBtn').removeClass('disabled')
		});
	}

	const _handleResponse = (response) =>
	{
		let action = () => {
			_modal.modal('hide');
			UsersTableModule.reload();
		};

		swal.fire("Exito!", response.message, "success")
			.then(() => action())
			.catch(() => action());
	}

	const _handleError = (_error) =>
	{
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

$('#createUserModalBtn').click(CreateUserModule.showModal);

$('#createUserModal').on('change','#photoInput',CreateUserModule.previewImage);

$(document).on('submit','#createUserForm',CreateUserModule.sendForm);

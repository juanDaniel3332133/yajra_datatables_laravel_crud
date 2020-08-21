<div class="modal-dialog modal-success" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Editar usuario</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

      <form id="updateUserForm" enctype="multipart/form-data" method="POST" action="{{route('users.update', $user->id)}}">

        @method('PUT')

        <div class="form-group">
         <label for="first_name">Nombres:</label>
         <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nombres" value="{{$user->first_name}}">
       </div>

       <div class="form-group">
         <label for="last_name">Apellidos:</label>
         <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" value="{{$user->last_name}}">
       </div>

       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@email.com" value="{{$user->email}}">
       </div>  

       <div class="input-group mb-4">
         <div class="input-group-prepend">
           <span class="input-group-text"><b>Activo</b></span>
         </div>

         <label class="ml-4 mt-2 form-control-static">
           <input type="checkbox" class="custom-checkbox" name="status" 
            @if($user->status === 'activo') checked @endif
           >
           </span>
         </label>

       </div>                    

       <div class="form-group text-center">

        <img src="{{$user->profile_image_path}}" class="img-fluid col toggleFullscreenImage mb-2 pointer" alt="..." id="newUserImage">

        <input id="newPhotoInput" type="file" accept='image/png, image/jpg, image/jpeg' size="5"  name="profile_image">

        <label class="btn btn-md btn-primary" for="newPhotoInput">Nueva imagen</label>
        <br>
        <span class="text-danger">Nueva imagen reemplazar anterior</span>

      </div>

    </form>
  </div>
  <div class="modal-footer">
    <button type="submit" form="updateUserForm" id="sendUpdateUserFormBtn" class="btn btn-primary">Actualizar</button>
  </div>
</div>
</div>
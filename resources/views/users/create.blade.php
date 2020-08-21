<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Nuevo usuario</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form id="createUserForm" enctype="multipart/form-data" method="POST" action="{{route('users.store')}}">
          
          <div class="form-group">
            <label for="first_name">Nombres:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nombres">
          </div>
          
          <div class="form-group">
            <label for="last_name">Apellidos:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos">
          </div>
          
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@email.com">
          </div>  

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text"><b>Activo</b></span>
            </div>

            <label class="ml-4 mt-2 form-control-static">
              <input type="checkbox" class="custom-checkbox" name="status" checked>
              </span>
            </label>

          </div>          

          <div class="form-group text-center">
            
            <img src="{{asset("/assets/img/avatars/default.png")}}" class="img-fluid col toggleFullscreenImage mb-2 pointer" alt="..." id="userImage">

            <input id="photoInput" type="file" accept='image/png, image/jpg, image/jpeg' size="5"  name="profile_image">

            <label class="btn btn-md btn-primary" for="photoInput">Seleccione imagen</label>

          </div>

        </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="createUserForm" id="sendCreateUserFormBtn" class="btn btn-primary">Registrar</button>
    </div>
  </div>
</div>
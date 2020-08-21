<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Detalles de producto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>

        <div class="form-group">
         <label for="first_name">Nombres:</label>
         <input disabled="" type="text" class="form-control" id="first_name" name="first_name" placeholder="Nombres" value="{{$user->first_name}}">
       </div>

       <div class="form-group">
         <label for="last_name">Apellidos:</label>
         <input disabled="" type="text" class="form-control" id="last_name" name="name" placeholder="Apellidos" value="{{$user->last_name}}">
       </div>

       <div class="form-group">
         <label for="email">Email:</label>
         <input disabled="" type="email" class="form-control" id="email" name="name" placeholder="ejemplo@email.com" value="{{$user->email}}">
       </div>  

       <div class="input-group mb-4">
         <div class="input-group-prepend">
           <span class="input-group-text"><b>Activo</b></span>
         </div>

         <label class="ml-4 mt-2 form-control-static">
           <input disabled="" type="checkbox" class="custom-checkbox" name="status" 
            @if($user->status === 'activo') checked @endif
           >
           </span>
         </label>

       </div>            

       <div class="form-group text-center">

        <img src="{{$user->profile_image_path}}" class="img-fluid col toggleFullscreenImage mb-2 pointer" alt="..." id="productImage">

      </div>

    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" class="close" data-dismiss="modal">Aceptar</button>
  </div>
</div>
</div>
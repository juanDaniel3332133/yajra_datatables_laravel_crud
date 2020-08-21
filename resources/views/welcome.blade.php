<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.5.2-dist/css/bootstrap.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <meta name="csrf-token" content="{{csrf_token()}}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container my-4">

                <div class="row text-center text-muted">
                    <div class="col">
                        <h1>YAJRA DATATABLES LARAVEL CRUD</h1>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-sm-3">
                        
                        <label for="filterPerStatusSelect">Filtrar por estado:</label>
                        <select class="float-left form-control" id="filterPerStatusSelect">
                            <option value="*">Ninguno</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>


                    </div>

                    <div class="offset-sm-6 col-sm-3">
                        <a id="createUserModalBtn" class="btn btn-md btn-primary float-right">Nuevo Usuario</a>
                    </div>
                </div>

                <table id="usersTable" class="table table-hover text-center">
                </table>

            </div>
        </div>

        {{-- User modals --}}

        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        {{-- scripts --}}

        <script src="{{ asset('plugins/jquery-3.5.1/jquery-3.5.1.min.js') }}"> </script>

        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"> </script>

        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"> </script>

        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"> </script>

        <script src="{{ asset('plugins/bootstrap-4.5.2-dist/js/bootstrap.min.js') }}"> </script>

        <script src="{{asset('js/shared/helpers.js')}}"></script>

        <script src="{{asset('js/users/index.js')}}"></script>
        <script src="{{asset('js/users/create.js')}}"></script>
        <script src="{{asset('js/users/show.js')}}"></script>
        <script src="{{asset('js/users/edit.js')}}"></script>
        <script src="{{asset('js/users/delete.js')}}"></script>

    </body>
</html>

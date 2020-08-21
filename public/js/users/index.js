const UsersTableModule = (() => {

    const _table = $('#usersTable'); 

    const _dataUrl = `/api/datatable/users`; 

    const init = () =>
    {
        _table.DataTable( {
            serverSide: true,
            processing: true,
            ajax: {
                url: _dataUrl,
            },
            columns: [
                { title: 'Nombre', data: 'name' },
                { title: 'Email',  data: 'email'},
                { title: 'Estado', data: 'status', render: (data, type, row) => {
                    let bgColor = row.status === 'activo' ? 
                                  "bg-primary" :  
                                  "bg-danger";

                  return `<span class="p-2 text-white badge ${bgColor}" >${row.status}</span>`;

                } },
                { title: 'Acciones', render:( data, type, row ) => {
                      return         `<a href="/users/${row.id}/edit" class="btn btn-sm mb-2 btn-block btn-success editUser">Editar<a/>
                                     <a href="/users/${row.id}" class="btn btn-sm mb-2 btn-block btn-info userDetails">Ver Detalles<a/>
                                     <a href="/users/${row.id}" class="btn btn-sm mb-2 btn-block btn-danger removeUser">Eliminar<a/>`;
                }},
            ],
            language: {
              processing: "Procesando...",
              search: "Buscar:",
              lengthMenu: "Mostrar _MENU_ elementos",
              info: "Mostrando desde _START_ al _END_ de _TOTAL_ elementos",
              infoEmpty: "Mostrando ningún elemento.",
              infoFiltered: "(filtrado _MAX_ elementos total)",
              infoPostFix: "",
              loadingRecords: "Cargando registros...",
              zeroRecords: "No se encontraron registros",
              emptyTable: "No hay datos disponibles en la tabla",
              paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
              },
              aria: {
                sortAscending: ": Activar para ordenar la tabla en orden ascendente",
                sortDescending: ": Activar para ordenar la tabla en orden descendente"
              }
            }
        });
    }

    const reload = () => {
        _table.DataTable().ajax.reload(null, false);
    }

    const filterPerStatus = (event) => {

      let value = event.target.value,
             url = _dataUrl;

        if (value !== '*')
             url = `${url}?status=${value}`;

      _table.DataTable().ajax.url(url).load(null, false);

    }

    return {
        init: init,
        reload: reload,
        filterPerStatus: filterPerStatus
    };

})();

$(UsersTableModule.init);

$('#filterPerStatusSelect').change(UsersTableModule.filterPerStatus);

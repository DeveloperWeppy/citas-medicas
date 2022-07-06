$(document).ready(function () {
    /**funciòn jquery para configurar el dataTable*/
    $("#example").DataTable({
        language: {
            lengthMenu:
                "Mostrar " +
                `<select class="custom-select">
                    <option value='10'>10</option>
                    <option value='25'>25</option>
                    <option value='50'>50</option>
                    <option value='100'>100</option>
                    <option value='-1'>Todos</option>
                </select>` +
                " registros por página",
            zeroRecords: "No se encontró nada - lo siento",
            info: "Mostrando la página _PAGE_ de _PAGES_",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(Filtrado de _MAX_ registros totales)",
            search: "Buscar",
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });
});

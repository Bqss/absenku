let table;


$(document).ready(function () {
    table = $("#mytable").addClass('nowrap').DataTable({
        initComplete: function () {
            let api = this.api();
            $('#scan_filter input')
                .off('.DT')
                .on('keyup.DT', function (e) {
                    api.search(this.value).draw();
                });
        },
        responsive: true,
        processing: true,
        serverSide: true,
        colReorder: true,
        oLanguage: {
            sProcessing: "loading..."
        },
        lengthMenu: [
            [10, 25, 50, -1],
            ['10', '25', '50', 'Show all']
        ],
        "order": [[0, 'desc']],
        ajax: {
            "url": base_url + "scan/data",
            "type": "POST",
            "data": {
                "jenis_kegiatan": $('#jenis_kegiatan').val()
            },
        },
        columns:
            [
                { 'data': 'id', defaultContent: '' },
                { 'data': "no_induk" },
                { "data": "nama" },
                { "data": "ranting" },
                { "data": "rayon" },
            ],
        dom: 'Blfrtip',
        
        
    });
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
            table.cell(cell).invalidate('dom');
        });
    }).draw();

    if (checkLogin == 0) {
        $('.btn-create-data').hide();
        $('.btn-warning').css("display", "none");
    }
});

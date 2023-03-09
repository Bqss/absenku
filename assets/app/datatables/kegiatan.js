let table;

$(document).ready(function () {
    table = $("#mytable").addClass('nowrap').DataTable({
        initComplete: function () {
            let api = this.api();
            $('#kegiatan_filter input')
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
        "order": [[0, 'asc']],
        ajax: {
            "url": base_url + "kegiatan/data",
            "type": "POST",
        },
        columns:
            [
                { 'data': 'id_kegiatan', defaultContent: '' },
                { 'data': "kegiatan" },
                { "data": "lokasi" },
                { "data": "tgl" },
                { "data": "aktif" }, 
                { "data": null },
            ],
        "columnDefs": [
            {
                "data": {
                    "id_kegiatan": "id_kegiatan",
                
                },
                "targets": 5,
                "orderable": false,
                "searchable": false,
                "render": function (data, type, row, meta) {
                    let btn;
                    if (checkLogin == 1) {
                        return `<a href="${base_url}kegiatan/lihat/${data.id_kegiatan}" title="lihat" class="btn btn-md btn-success btn3d btn-view-data">
                        <i class="fa fa-eye"></i> Lihat
                        </a>
                        <a href="${base_url}kegiatan/update/${data.id_kegiatan}" title="edit" class="btn btn-md btn-warning  btn-edit-data">
                        <i class="fa fa-pencil-square-o"></i> Edit
                        </a>
                        <a href="${base_url}kegiatan/delete/${data.id_kegiatan}" title="hapus" class="btn btn-md btn-danger btn3d btn-remove-data">
                        <i class="fa fa-trash"></i> Hapus
                        </a>`;
                    }
                    else {
                        return `<a href="${base_url}kegiatan/lihat/${data.id_kegiatan}" title="edit" class="btn btn-md btn-success btn3d btn-view-data">
                        <i class="fa fa-eye"></i> Lihat
                        </a>`;
                    }
                }
            },
        ],
        dom: 'Blfrtip',
        buttons: [
            'colvis',
            {
                extend: 'csv',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
            {
                extend: 'excel',
                title: 'Data kegiatan',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
            {
                extend: 'copy',
                title: 'Data kegiatan',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
            {
                extend: 'pdf',
                oriented: 'portrait',
                pageSize: 'legal',
                title: 'Data kegiatan',
                download: 'open',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    doc.styles.tableBodyEven.alignment = 'center';
                    doc.styles.tableBodyOdd.alignment = 'center';
                },
            },
            {
                extend: 'print',
                oriented: 'portrait',
                pageSize: 'A4',
                title: 'Data kegiatan',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
        ],
        initComplete: function () {
            var $buttons = $('.dt-buttons').hide();
            $('#exportLink').on('change', function () {
                var btnClass = $(this).find(":selected")[0].id
                    ? '.buttons-' + $(this).find(":selected")[0].id
                    : null;
                if (btnClass) $buttons.find(btnClass).click();
            })
        },
        rowId: function (a) {
            return a;
        },
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
        },
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

let table;

$(document).ready(function () {
  table = $("#presensi")
    .addClass("nowrap")
    .DataTable({
      initComplete: function () {
        let api = this.api();
        $("#presensi_filter input")
          .off(".DT")
          .on("keyup.DT", function (e) {
            api.search(this.value).draw();
          });
      },
      responsive: true,
      processing: true,
      // serverSide: true,
      colReorder: true,
      oLanguage: {
        sProcessing: "loading...",
      },
      lengthMenu: [
        [10, 25, 50, -1],
        ["10", "25", "50", "Show all"],
      ],
      order: [[0, "asc"]],
      ajax: {
        url: base_url + "presensi/data/" + segment,
        type: "POST",
        dataSrc: "",
      },
      columns: [
        { data: null },
        { data: "nama" },
        { data: "nis" },
        { data: "ranting" },
        { data: "rayon" },
        { data: "tgl" },
        { data: "jam_msk" },
        { data: "ket" },
        { data: null },
      ],
      columnDefs: [
        {
          data: {
            id_absen: "id_absen",
          },
          targets: 8,
          orderable: false,
          searchable: false,
          render: function (data, type, row, meta) {
            let btn;
            if (checkLogin == 1) {
              return `
                    <a href="${base_url}presensi/detail/${data.id_absen}" title="lihat detail" class="btn btn-md btn-success  btn-view-data btn3d">
                    <i class="fa fa-eye"></i> Lihat
                    </a>
                    <a href="${base_url}presensi/delete/${data.id_absen}" title="hapus" class="btn btn-md btn-danger btn-remove-data btn3d ">
                    <i class="fa fa-trash"></i> Hapus
                    </a>`;
            } else {
              return ` 
                    <a href="${base_url}presensi/detail/${data.id_absen}" title="lihat detail" class="btn btn-md btn-success  btn-view-data btn3d">
                        <i class="fa fa-eye"></i> Lihat
                    </a>`;
            }
          },
        },
      ],
      // "createdRow": function (row, data, index) {
      //     if (data.id_status == 1) {
      //         $('td', row).eq(7).html('<span class="label label-success">' + data.nama_status + '</span>');
      //     }
      //     else if (data.id_status == 2) {
      //         $('td', row).eq(7).html('<span class="label label-danger">' + data.nama_status + '</span>');
      //     }
      //     else {
      //         $('td', row).eq(7).html('<span class="label label-default">' + data.nama_status + '</span>');
      //     }
      //     if (data.id_khd == 1) {
      //         $('td', row).eq(5).html('<span class="label label-success">' + data.nama_khd + '</span>');
      //     }
      //     else if (data.id_khd == 2) {
      //         $('td', row).eq(5).html('<span class="label label-info">' + data.nama_khd + '</span>');
      //     }
      //     else if (data.id_khd == 3) {
      //         $('td', row).eq(5).html('<span class="label label-warning">' + data.nama_khd + '</span>');
      //     }
      //     else if (data.id_khd == 4) {
      //         $('td', row).eq(5).html('<span class="label label-danger">' + data.nama_khd + '</span>');
      //     }
      //     else {
      //         $('td', row).eq(5).html('<span class="label label-default">' + data.nama_khd + '</span>');
      //     }
      // },
      dom: "Blfrtip",
      buttons: [
        "colvis",
        {
          extend: "csv",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7],
          },
        },
        {
          extend: "excel",
          title: "HISTORI ABSENSI " + namaKegiatan,
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7],
          },
        },
        {
          extend: "copy",
          title: "HISTORI ABSENSI " + namaKegiatan,
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7],
          },
        },
        {
          extend: "pdf",
          oriented: "portrait",
          pageSize: "legal",
          title: "HISTORI ABSENSI " + namaKegiatan,
          download: "open",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7],
          },
          customize: function (doc) {
            doc.content[1].table.widths = Array(
              doc.content[1].table.body[0].length + 1
            )
              .join("*")
              .split("");
            doc.styles.tableBodyEven.alignment = "center";
            doc.styles.tableBodyOdd.alignment = "center";
          },
        },
        {
          extend: "print",
          oriented: "portrait",
          pageSize: "A4",
          title: "HISTORI ABSENSI " + namaKegiatan,
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7],
          },
        },
      ],
      initComplete: function () {
        var $buttons = $(".dt-buttons").hide();
        $("#exportLink").on("change", function () {
          var btnClass = $(this).find(":selected")[0].id
            ? ".buttons-" + $(this).find(":selected")[0].id
            : null;
          if (btnClass) $buttons.find(btnClass).click();
        });
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
  table
    .on("order.dt search.dt", function () {
      table
        .column(0, { search: "applied", order: "applied" })
        .nodes()
        .each(function (cell, i) {
          cell.innerHTML = i + 1;
          table.cell(cell).invalidate("dom");
        });
    })
    .draw();
});

let table;

$(document).ready(function () {
  table = $("#mytable")
    .addClass("nowrap")
    .DataTable({
      initComplete: function () {
        let api = this.api();
        $("#ayamJago_filter input")
          .off(".DT")
          .on("keyup.DT", function (e) {
            api.search(this.value).draw();
          });
      },
      responsive: true,
      processing: true,
    //   serverSide: true,
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
        url: base_url + "hasilcek/data",
        type: "POST",
        dataSrc: "",
      },
      columns: [
        { data: null, defaultContent: "" },
        { data: "id_check" },
        { data: "id_ayam_jago" },
        { data: "keterangan" },
        { data: "alasan" },
        { data: "created_at" },
        { data: null}
      ],
      columnDefs: [
        {
         
          targets: 6,
          orderable: false,
          searchable: false,
          render: function (data, type, row, meta) {
            let btn;
            if (checkLogin == 0) {
              return `<a href="${base_url}hasilcek/detail/${data.id_hasil_cek}" title="lihat" class="btn btn-md btn-success btn3d btn-view-data">
                        <i class="fa fa-eye"></i> Lihat
                        </a>`;
            } else {
              return `  
                        <div class="flex justify-center">
                            <a href="${base_url}hasilcek/detail/${data.id_check}" title="lihat" class="btn btn-md btn-success btn3d btn-view-data">
                                <i class="fa fa-eye"></i> Lihat
                            </a>
                            <a href="${base_url}hasilcek/delete/${data.id_check}" title="delete" class="btn btn-md btn-danger btn3d btn-view-data">
                                <i class="fa fa-trash"></i>Delete
                            </a>
                        </div>
                        `;
            }
          },
        },
      ],
      dom: "Blfrtip",
      buttons: [
        "colvis",
        {
          extend: "csv",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5],
          },
        },
        {
          extend: "excel",
          title: "Data hasil cek ayam jago",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5],
          },
        },
        {
          extend: "copy",
          title: "Data hasil cek ayam jago",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5],
          },
        },
        {
          extend: "pdf",
          oriented: "portrait",
          pageSize: "legal",
          title: "Data hasil cek ayam jago",
          download: "open",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5],
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
          title: "Data hasil cek ayam jago",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5],
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
      rowCallback: function (row, data, index) {
        var row_number = index + 1;
        $("td:eq(0)", row).html(row_number);
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

  if (checkLogin == 0) {
    $(".btn-create-data").hide();
    $(".btn-warning").css("display", "none");
  }
});
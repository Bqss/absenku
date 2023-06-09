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
        url: base_url + "ayamjago/data",
        type: "POST",
        dataSrc: "",
      },
      columns: [
        { data: null, defaultContent: "" },
        { data: "id_ayam_jago" },
        { data: "nama" },
        { data: "ttl" },
        { data: "weton" },
        { data: "usia" },
        { data: "jenis_latihan" },
        { data: null },
      ],
      columnDefs: [
        {
          data: {
            id_ayam_jago: "id_ayam_jago",
          },
          targets: 7,
          orderable: false,
          searchable: false,
          render: function (data, type, row, meta) {
            let btn;
            if (checkLogin == 0) {
              return `<a href="${base_url}ayamJago/detail/${data.id_ayam_jago}" title="lihat" class="btn btn-md btn-success btn3d btn-view-data">
                        <i class="fa fa-eye"></i> Lihat
                        </a>`;
            } else {
              return `  
                        <a href="${base_url}ayamJago/detail/${data.id_ayam_jago}" title="lihat" class="btn btn-md btn-success btn3d btn-view-data">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                        <a href="${base_url}ayamJago/update/${data.id_ayam_jago}" title="edit" class="btn btn-md btn-primary btn3d btn-view-data">
                            <i class="fa fa-pen"></i> Edit
                        </a>
                        <a href="${base_url}ayamJago/delete/${data.id_ayam_jago}" title="delete" class="btn btn-md btn-danger btn3d btn-view-data">
                            <i class="fa fa-trash"></i>Delete
                        </a>
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
            columns: [0, 1, 2, 3, 4, 5, 6],
          },
        },
        {
          extend: "excel",
          title: "Data Ayam Jago",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6],
          },
        },
        {
          extend: "copy",
          title: "Data Ayam Jago",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6],
          },
        },
        {
          extend: "pdf",
          oriented: "portrait",
          pageSize: "legal",
          title: "Data Ayam Jago",
          download: "open",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6],
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
          title: "Data Ayam Jago",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6],
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
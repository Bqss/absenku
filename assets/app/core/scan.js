



var arg = {
    resultFunction: function(result) {
        //$('.hasilscan').append($('<input name="id_karyawan" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
       // $.post("../cek.php", { noijazah: result.code} );

        var redirect = 'scan/cek_id';

        $.redirectPost(redirect, {
            no_induk: result.code,
            jenis_kegiatan: $('#jenis_kegiatan').val(),
        });


        
    }
};

var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
decoder.buildSelectMenu("#camera-select");
decoder.play();
  /*  Without visible select menu
      decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
  */
$('#camera-select').on('change', function(){
    decoder.stop().play();
});


// jquery extend function
$.extend(
{
    redirectPost: function(location, args)
    {

        
        var form = '';
        $.each( args, function( key, value) {
            console.log(value)
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        // console.log(args);
        // document.getElementById("content").insertAdjacentHTML("afterend", `<form action="${location}" method="POST">${form}</form>`)
        $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
    }
});



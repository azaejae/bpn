$.getJSON("api/desa.php",{menu : "getnamadesa"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            $("#desa tbody").append("<tr>" +
                "<td>"+hasil.id_desa_kel+"</td>"+
                "<td>"+hasil.kode_desa+"</td>"+
                "<td>"+hasil.nama_desa_kel+"</td>"+
                "<td>"+hasil.nama_kecamatan+"</td>"+
                "</tr>");

        });
    }).done(function(){
    $('#desa').DataTable();
});

$("#tambah_desa").click(function(){
    //window.open("http://www.google.com", "yyyyy", "width=800,height=600,resizable=yes,toolbar=no,menubar=no,location=no,status=no"); return false;
    $("#konten").load('tambah_desa.php');
    $.getScript("js/desa.js");
});


$( "#nama_kec" ).autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "api/kecamatan.php?menu=daftar_kec",
            dataType: "json",
            data: {term: request.term},
            success: function(data) {
                response($.map(data, function(item) {
                    return {
                        label: item.label,
                        id: item.id_kecamatan
                    };
                }));
            }
        });
    },
    minLength: 1,
    select: function(event, ui) {
        $('#id_kec').val(ui.item.id);
        //$('#abbrev').val(ui.item.abbrev);
    }
});

$('#f_tambah_desa').submit(function(){
    var host='api/desa.php?menu=tambah_desa'
    $.ajax({
        url : host,
        type: "POST",
        data : $('form#f_tambah_desa').serialize(),
        dataType: "JSON",
        success: function(respon)
        {
            if(respon.hasil==='berhasil')
            {
                alert(respon.pesan)

            }
            else
            {
                alert(respon.pesan);
            }
        }
    }).done(function(){
        $(location).attr('href','index.php');
    });
    return false;
});
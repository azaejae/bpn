$.getJSON("api/desa.php",{menu : "getnamadesa"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            $("#desa tbody").append("<tr>" +
                "<td>"+hasil.id_desa_kel+"</td>"+
                "<td>"+hasil.kode_desa+"</td>"+
                "<td>"+hasil.nama_desa_kel+"</td>"+
                "<td>"+hasil.nama_kecamatan+"</td>"+
                "<td><a href='#' onclick='editDesa("+hasil.id_desa_kel+",\""+hasil.kode_desa+"\","+hasil.id_kecamatan+",\""+hasil.nama_desa_kel+"\",\""+hasil.nama_kecamatan+"\")' ><span class='glyphicon glyphicon-edit')></span></a></td>"+
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
    var host='api/desa.php?menu=tambah_desa';
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


function editDesa(id_desa,kode_desa,id_kecamatan,nama_desa,nama_kecamatan)
{
    $("#konten").load('tambah_desa.php', function()
    {
        $("#kode").val(kode_desa);
        $("#nama_kec").val(nama_kecamatan);
        $("#id_kec").val(id_kecamatan);
        $("#nama_desa").val(nama_desa);
        $("#id_desa").val(id_desa);
        $("#tambah_desa").hide();
        $("#ubah_desa").show();
        $.getScript("js/desa.js");
    });
}

$("#ubah_desa").click(function(){
    var host='api/desa.php?menu=update_desa'
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
$.getJSON("api/berkas.php",{menu : "getdaftarberkas"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            $("#berkas tbody").append("<tr>" +
                "<td>"+hasil.no_buku+"</td>"+
                "<td>"+hasil.barcode+"</td>"+
                "<td>"+hasil.nama_pemegang_hak+"</td>"+
                "<td>"+hasil.jenis_hak+"</td>"+
                "<td>"+hasil.nomor_hak+"</td>"+
                "</tr>");

        });
    }).done(function(){
    $('#berkas').DataTable();
});

$("#tambah_berkas").click(function(){
    //window.open("http://www.google.com", "yyyyy", "width=800,height=600,resizable=yes,toolbar=no,menubar=no,location=no,status=no"); return false;\
    // alert("jalan");
    $("#konten").load('tambah_berkas.php');
    $.getScript("js/berkas.js");
    $.getScript("js/bootstrap-datepicker.js");
});

$( "#desa" ).autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "api/desa.php?menu=getdesabynama",
            dataType: "json",
            data: {term: request.term},
            success: function(data) {
                response($.map(data, function(item) {
                    return {
                        label: item.label,
                        id: item.id_desa_kel
                    };
                }));
            }
        });
    },
    minLength: 1,
    select: function(event, ui) {
        $('#id_desa_kel').val(ui.item.id);
        //$('#abbrev').val(ui.item.abbrev);
    }
});

$( "#loker" ).autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "api/loker.php?menu=getlokerbykode",
            dataType: "json",
            data: {term: request.term},
            success: function(data) {
                response($.map(data, function(item) {
                    return {
                        label: item.label,
                        id: item.id_loker
                    };
                }));
            }
        });
    },
    minLength: 2,
    select: function(event, ui) {
        $('#id_loker').val(ui.item.id);
        //$('#abbrev').val(ui.item.abbrev);
    }
});
//$('#tgl_surat_ukur').datepicker();
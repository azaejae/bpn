$.getJSON("api/berkas.php",{menu : "getdaftarberkas"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            $("#berkas tbody").append("<tr>" +
                "<td>"+hasil.no_buku+"</td>"+
                "<td>"+hasil.barcode+"</td>"+
                "<td>"+hasil.nama_pemegang_hak+"</td>"+
                "<td>"+hasil.jenis_hak+"</td>"+
                "<td>"+hasil.nomor_hak+"</td>"+
                "<td><a href='#' onclick='detail(\""+hasil.no_buku+"\")'><span class='glyphicon glyphicon-folder-open' alt='detail' title='detail'></span></a> </td>"+
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

$('#f_tambah_berkas').submit(function(){
    var host='api/berkas.php?menu=tambahberkas';
    $.ajax({
        url : host,
        type: "POST",
        data : $('form#f_tambah_berkas').serialize(),
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
    alert('jalan');
    return false;
});

function detail(no_buku)
{
    alert(no_buku);
    $("#konten").load('detail_berkas.php');
    $.getJSON("api/berkas.php",{menu : "detailberkas",no_buku : no_buku})
        .done(function(result){
            $.each(result.data,function(i, hasil){
                if(hasil.status_pinjam==2)
                {
                    stp="Dipinjam";
                }
                else
                {
                    stp="Tersimpan Di Loker"
                }
                $("#detail_berkas tbody").append(
                    "<tr>" +
                    "<th scope=\"row\">NO Buku</th>"+
                    "<td>"+hasil.no_buku+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Bacrode</th>"+
                    "<td>"+hasil.barcode+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Asal Hak</th>"+
                    "<td>"+hasil.asal_hak+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Nama Pemegang Hak</th>"+
                    "<td>"+hasil.nama_pemegang_hak+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Jenis Hak</th>"+
                    "<td>"+hasil.jenis_hak+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Nomor Hak</th>"+
                    "<td>"+hasil.nomor_hak+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">D.I. 307</th>"+
                    "<td>"+hasil.d_i_307+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">D.I. 208</th>"+
                    "<td>"+hasil.d_i_208+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Surat Ukur</th>"+
                    "<td>"+hasil.surat_ukur+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Tanggal Surat Ukur</th>"+
                    "<td>"+hasil.tgl_surat_ukur+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Luas</th>"+
                    "<td>"+hasil.luas+" M<sup>2</sup></td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Tanggal Terbit</th>"+
                    "<td>"+hasil.tgl_terbit+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Penerbit</th>"+
                    "<td>"+hasil.penerbit+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Penunjuk</th>"+
                    "<td>"+hasil.penunjuk+"</td>"+
                    "</tr>"+
                    "<tr>" +
                    "<th scope=\"row\">Status</th>"+
                    "<td>"+stp+"</td>"+
                    "</tr>"
                );

            });
        }).done(function(){
        alert("jalan");
    });
    $.getScript("js/berkas.js");
}

//$('#tgl_surat_ukur').datepicker();
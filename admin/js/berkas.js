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
});
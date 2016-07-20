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
    window.open("http://www.google.com", "yyyyy", "width=800,height=600,resizable=yes,toolbar=no,menubar=no,location=no,status=no"); return false;
});
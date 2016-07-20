$.getJSON("admin/api/desa.php",{menu : "getnamadesa"})
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
})


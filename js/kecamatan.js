$.getJSON("admin/api/kecamatan.php",{menu : "getnamakecamatan"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            $("#kecamatan tbody").append("<tr>" +
                "<td>"+hasil.id_kecamatan+"</td>"+
                "<td>"+hasil.kode+"</td>"+
                "<td>"+hasil.nama_kecamatan+"</td>"+
                "</tr>");

        });
    }).done(function(){
    $('#kecamatan').DataTable();
})


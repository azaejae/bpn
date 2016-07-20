$.getJSON("api/kecamatan.php",{menu : "getnamakecamatan"})
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
});

$("#tambah_kecamatan").click(function(){
    //window.open("http://www.google.com", "yyyyy", "width=800,height=600,resizable=yes,toolbar=no,menubar=no,location=no,status=no"); return false;\
   // alert("jalan");
    $("#konten").load('tambah_kecamatan.php');
    $.getScript("js/kecamatan.js");
});

$('#f_tambah_kecamatan').submit(function(){
    var host='api/kecamatan.php?menu=tambah_kecamatan'
    $.ajax({
        url : host,
        type: "POST",
        data : $('form#f_tambah_kecamatan').serialize(),
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

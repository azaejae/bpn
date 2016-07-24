$.getJSON("api/loker.php",{menu : "getloker"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            $("#loker tbody").append("<tr>" +
                "<td>"+hasil.id_loker+"</td>"+
                "<td>"+hasil.kode_loker+"</td>"+
                "<td>"+hasil.keterangan+"</td>"+
                "</tr>");

        });
    }).done(function(){
    $('#kecamatan').DataTable();
});

$("#tambah_loker").click(function(){
    //window.open("http://www.google.com", "yyyyy", "width=800,height=600,resizable=yes,toolbar=no,menubar=no,location=no,status=no"); return false;\
    // alert("jalan");
    $("#konten").load('tambah_loker.php');
    $.getScript("js/loker.js");
});

$('#f_tambah_loker').submit(function(){
    var host='api/loker.php?menu=tambahloker'
    $.ajax({
        url : host,
        type: "POST",
        data : $('form#f_tambah_loker').serialize(),
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
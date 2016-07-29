$.getJSON("api/user.php",{menu : "daftaruser"})
    .done(function(result){
        $.each(result.data,function(i, hasil){
            var a;
            if(hasil.status==1)
            {
                a="Pegawai";
            }
            else
            {
                a="Anak honor";
            }
            $("#pengguna tbody").append("<tr>" +
                "<td>"+hasil.nip+"</td>"+
                "<td>"+hasil.nama_lengkap+"</td>"+
                "<td>"+a+"</td>"+
                "</tr>");

        });
    }).done(function(){
    $('#kecamatan').DataTable();
});

$("#tambah_pengguna").click(function(){
    //window.open("http://www.google.com", "yyyyy", "width=800,height=600,resizable=yes,toolbar=no,menubar=no,location=no,status=no"); return false;\
    // alert("jalan");
    $("#konten").load('tambah_user.php');
    $.getScript("js/user.js");
});

$('#f_tambah_user').submit(function(){
    var host='api/user.php?menu=tambahuser'
    $.ajax({
        url : host,
        type: "POST",
        data : $('form#f_tambah_user').serialize(),
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
        //$(location).attr('href','index.php');
        $("#konten").load('user.php');
        $.getScript("js/user.js");
    });
    return false;
});
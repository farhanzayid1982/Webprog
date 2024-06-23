$(document).ready(function(){
    $("#cmdSimpan").click(function(){
      //alert($("#rL").is(":checked"));
      if($("#rL").is(":checked")) { gender = "L"; } else { gender = "P";};
      //Proses Validasi Data
      if($("#txtUser_id").val() == "") { 
        alert("User ID belum di definisikan!!!");
        $("#txtUser_id").focus()
        event.stop();
      };
      $.post("user_save.php",
          {
            user_id: $("#txtUser_id").val(),
            olduser_id:$("#txtOldUser_id").val(),
            pass:$("#txtPass1").val(),
            gender:gender,
            tmp_lhr:$("#txtTmp_lhr").val(),
            tgl_lhr:$("#txtTgl_lhr").val()
          },
          function(data,status){
              //alert("data " + data);
              obj = JSON.parse(data);
              //alert(obj.status);
              if(obj.status=="SUKSES") {
                alert(obj.pesan);
                window.open("view.php", "_SELF");
              }
          });
    });
    $("#cmdCancel").click(function(){
      //alert("CANCEL");
      window.open("view.php", "_SELF");
    });
  });
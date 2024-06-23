function edit_click(id) {
    //alert("EDIT " + id);
    window.open("addedit.php?id=" + id, "_SELF")
}
function hapus_click(id) {
    //alert("HAPUS " + id);
    $.post("user_del.php",
        {
          user_id: id
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
}
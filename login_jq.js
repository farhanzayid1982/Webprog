//Penggunaan JQuery
$(document).ready(function(){
    $("#cmdLogin").click(function(){
      $user_id = $("#txtUser_id").val();
      $pass = $("#txtPass").val();
      //alert($user_id);
      $.post("login_act.php",
      {
        user_id: $user_id,
        password: $pass
      },
      function(data,status){
          //alert("Data: " + data + "\nStatus: " + status);
          alert("Login " + data);
          if(data=="SUKSES") {
            window.open("view.php", "_SELF");
          }
      });
    });
  });

  //Penggunaan AJAX
  function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("demo").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax_info.txt");
    xhttp.send();
  }
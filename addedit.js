function password_change() {
    pass1 = document.getElementById("txtPass1").value;
    pass2 = document.getElementById("txtPass2").value;
    if(pass1 != pass2) {
        document.getElementById("txtPass1Notif").innerHTML = '<label style="color:red">Password berbeda!</label>';
    } else {
        document.getElementById("txtPass1Notif").innerHTML = '<label style="color:green">OK</label>';
    }
}
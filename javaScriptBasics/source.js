/**
 * Created by abanna on 3/20/2017.
 */
function printName()
{
    document.frm.txtName.value="Abdulkarim Albanna";

}
function alertName()
{
    alert("Abdulkarim Albanna");

}

function checkUser() {
    var userName=document.frm.txtUserName.value;
    var password=document.frm.txtPassword.value;

    if(userName=="abed" && password=="abed")
    alert("Welcome in javaScript");
    else
    {
document.getElementById("msg").innerHTML="<font color=red>Invalid Username or password</font>"
    }

}
let submitBtn=document.querySelector("#sendBtn");
let checkBox=document.querySelector("#checkTerm")
let form=document.querySelector("#get_mail")
let alertM=document.querySelector(".alert_tos");
submitBtn.onclick=function(){
    if (checkBox.checked == true) {
        form.setAttribute('action','/includes/action.php');
    }
    else{
    alertM.style.display = 'flex';
    alertM.style.right = "10px";
    }
checkBox.onclick=function(){
    if (checkBox.checked == true) {
        alertM.style.display = 'none';
    }
    else{
        form.setAttribute('action','');
    }
}
}
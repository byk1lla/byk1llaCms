function popUp(title,message,status){
    Swal.fire({
        title: title,
        icon: status,
        html: message,
        confirmButtonText:'Tamam',

    })
}
function popUpwPos(position,title,message,status){
    Swal.fire({
        position:position,
        width:400,
        title: title,
        icon: status,
        html: message,
        showConfirmButton:false,
        timer:1500
    })
}
function Confirm(title, message) {
    return new Promise((resolve) => {
        Swal.fire({
            title: title,
            text: message,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Evet',
            cancelButtonText: 'Hayır',
        }).then((result) => {
            if (result.isConfirmed) {

                resolve(true);
            } else if (result.dismiss === Swal.DismissReason.cancel) {

                resolve(false);
            }
        });
    });
}
function handleDelete(user,app,id,link) {
    return Confirm('Bilgi', `${user} adlı ${app} silinecek, onaylıyor musunuz?`)
        .then((confirmed) => {
            if (confirmed) {

                window.location.href = `/admin/delete-${link}/${id}`;
            } else {
                return false;
            }
        });
}

function handleSomething(user,app,id,link) {
    return Confirm('Bilgi', `${user} adlı ${app} silinecek, onaylıyor musunuz?`)
        .then((confirmed) => {
            if (confirmed) {

                window.location.href = `/admin/${link}/${id}`;
            } else {
                return false;
            }
        });
}
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
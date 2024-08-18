const items = document.querySelectorAll('.carousel-item');


items.forEach(item => {
    item.addEventListener('mouseenter', () => {
        document.getElementById('carousel').style.animationPlayState = 'paused'; // Animasyonu durdurur
    });

    item.addEventListener('mouseleave', () => {
        document.getElementById('carousel').style.animationPlayState = 'running'; // Animasyonu devam ettirir
    });
});

$(document).ready(function (){
    $("#contactForm").on('submit',function (event) {
        sendForm(this,"/api/contact")
            .done(function (response){
                console.log(response.status);
                if(response.status == "success"){
                    popUp('Tebrikler!','Mesajın bize ulaştı! En yakın zamanda tarafınıza mail veya telefon aracılığı ile iletişim sağlanacaktır!\n İyi günler 🙂','success');
                }else{
                    popUp('Üzgünüz :(',"Mesajınız bize iletilemedi. Lütfen daha sonra tekrar deneyiniz.","error");
                }
            })
            .fail(function (error){

                console.log("Hata var!");
            })
    })


    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    menuBtn.addEventListener('click', () => {
        if (menu.classList.contains('max-h-0')) {
            menu.classList.remove('max-h-0');
            menu.classList.add('max-h-screen');
        } else {
            menu.classList.add('max-h-0');
            menu.classList.remove('max-h-screen');
        }
    });

})


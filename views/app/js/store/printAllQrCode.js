const divFlex = document.querySelector('#AllQRCode');

(async()=>{
    await fetch('core/route/endPointAllActives.php')
    .then(res => res.json())
    .then(response => {
        response.forEach(datos => {
            divFlex.innerHTML += `
            <div class="p-2 m-2 codesQr">
                <img src="views/assets/images/logo/logo_black.jpg" width="128" height="auto" class="mb-1    "/>
            </div>`;
        });
        
        let qr_id = 0;
        response.forEach(datos => {

        let element = document.getElementsByClassName('codesQr')[qr_id++];
                    
            var qrcode = new QRCode(element, {
                text: datos.code_qr,
                width: 128,
                height: 128,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.L
            });

        });

    })
    .catch(error => console.error(error))    
    //console.log(divFlex.children);
    
})();


function print() {
	printJS({
    printable: 'AllQRCode',
    type: 'html',
    targetStyles: ['*']
 })
}

document.getElementById('printButton').addEventListener ("click", print);




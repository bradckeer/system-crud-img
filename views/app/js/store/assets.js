"use strict";

// Llena la tabla automatimanete con todos los resultados

const table = document.querySelector('#table');
const tableBody = document.querySelector('#activos');
const codeSpan = document.querySelector('#totalList');


(async()=>{
    await fetch('core/route/endPointAllActives.php')
            .then(res => res.json())
            .then(response => {
                if(response === 'No rows') {
                    var row = table.insertRow(1);
                    row.id = 'no_rows';
                   
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                   
                    cell1.innerHTML = "";
                    cell2.innerHTML = "";
                    cell3.innerHTML = "";
                    cell4.innerHTML = "No hay datos hoy";
                    cell5.innerHTML = "";
                    cell6.innerHTML = "";
    
                    
                } else {

                    response.forEach(datos => {
                        
                        const [year, month, day] = [...datos.warranty_date.split('-')];
                        
                        tableBody.innerHTML += `
                        <tr class="qr_generate">
                        <td class="text-center"></td>
                        <td class="text-center"><b>${datos.quantity}</b></td>
                        <td class="text-center"><b>${datos.descrip_product} | ${datos.marc_product} | ${datos.model_product} | ${datos.serial_product}</b></td>
                        <td class="text-center"><b>${datos.bill_num}</b></td>
                        <td class="text-center"><b>${datos.cost_center}</b></td>
                        <td class="text-center"><b>${day + '/' + month + '/' + year}</b></td>
                        </tr>`;
                        
                        
                        
                    });
                    
                    codeSpan.innerHTML = response.length;
                    
                    
                }
                
                let qr_id = 0;
                response.forEach(datos => {

                    let element = document.getElementsByClassName('qr_generate')[qr_id++].children[0];
                   
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
            .catch(error => console.error(error));
})();

// Filtra la busqueda

const formData = document.querySelector('#filter-item');
formData.addEventListener('keyup', filterItem);


async function filterItem(e){
    e.preventDefault();

    const form = new FormData(formData);

    if(document.getElementById('filter')){
        document.getElementById('filter').remove();
    }
    
    await fetch('core/route/endPointFilterActives.php', {
            method: 'POST',
            body: form
            })
            .then(res => res.json())
            .then(response => {
                                
                if (response.success) {

                    var row = table.insertRow(1);
                    row.id = 'filter';
                    row.classList = 'danger';
                
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);

                    cell2.setAttribute('colspan', 6);
                    cell1.classList = 'text-center';
                    cell2.classList = 'text-center';

                    cell1.innerHTML = '<i class="far fa-frown fa-7x"></i>';
                    cell2.innerHTML = '<b> Ups! - Objeto no encontrado...</b>';
                
                } else {

                    var row = table.insertRow(1);
                    row.id = 'filter';
                    row.classList = 'info';

                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    
                    cell1.classList = 'text-center';
                    cell2.removeAttribute('colspan');
                    cell2.classList = 'text-center';
                    cell3.classList = 'text-center';
                    cell4.classList = 'text-center';
                    cell5.classList = 'text-center';
                    cell6.classList = 'text-center';
                    
                    const [year, month, day] = [...response.warranty_date.split('-')];
                    let element = document.getElementById('filter').children[0];
                       var qrcode = new QRCode(element, {
                           text: response.code_qr,
                           width: 128,
                           height: 128,
                           colorDark : "#000000",
                           colorLight : "#ffffff",
                           correctLevel : QRCode.CorrectLevel.L
                       });
  
                    cell1.innerHTML;
                    cell2.innerHTML = response.quantity;
                    cell3.innerHTML = `${response.descrip_product} | ${response.marc_product} | ${response.model_product} | ${response.serial_product}`;
                    cell4.innerHTML = response.bill_num;
                    cell5.innerHTML = response.cost_center;
                    cell6.innerHTML = `${day + '/' + month + '/' + year}`; 

                }

            })
            .catch(error => console.error(error));
}



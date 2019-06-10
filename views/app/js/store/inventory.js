"use strict";

const formInventory = document.querySelector('#insert-article-inventory');
const statusResult = document.querySelector('#status_result');
const articleAdd = document.querySelector('#article_add');
const table = document.querySelector('#table');
const chckNew = document.querySelector('#condition-new');
const chckUsed = document.querySelector('#condition-used');
const codeSpan = document.querySelector('#total');

chckNew.addEventListener('change', fnChckNew);

function fnChckNew(e){
    e.preventDefault();
    if (chckNew.checked) {
        chckUsed.checked = false;
    }

}
chckUsed.addEventListener('change', fnChckUsed);
function fnChckUsed(e){
    e.preventDefault();
    e.stopPropagation();
    if (chckUsed.checked) {
        chckNew.checked = false;
    }

}


formInventory.addEventListener('submit', getNewArticle);

(async ()=>{
    await fetch('core/route/endPointInventoryListAddUltimateToday.php')
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
                    articleAdd.innerHTML += `
                    <tr>
                        <td class="text-center"><img src="https://api.qrserver.com/v1/create-qr-code/?data=${datos.code_qr}&amp;size=100x100" alt="${datos.descrip_product}" title="${datos.marc_product}"></td>
                        <td class="text-center"><b>${datos.quantity}</b></td>
                        <td class="text-center"><b>${datos.descrip_product} | ${datos.marc_product} | ${datos.model_product} | ${datos.serial_product}</b></td>
                        <td class="text-center"><b>${datos.bill_num}</b></td>
                        <td class="text-center"><b>${datos.cost_center}</b></td>
                        <td class="text-center"><b>${day + '/' + month + '/' + year}</b></td>
                    </tr>`;
                });
                codeSpan.innerHTML = response.length;
            }         
        })
        .catch(error => console.error(error));   
})();

async function getNewArticle(e) {

    e.preventDefault();
    e.stopPropagation();

    const formulario = new FormData(formInventory);
    //console.log(formulario);
    var id;
    for (const iterator of formulario.entries()) {
        
        id = String('#' + iterator[0]);
        id = id.substring(id.length, 0);        
        
        if(!iterator[1]) {            
            statusResult.innerHTML = `
                <div class="alert alert-warning text-center" role="alert">
                    ¡Todos los <strong>Campos del formulario deben estar llenos</strong>..!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>`;
            setTimeout(() => {
                statusResult.innerHTML = `
                    <div class="alert alert-info text-center" role="alert">
                        ¡El campo <i class="fas fa-arrow-right"></i> <strong>${document.querySelector(id).getAttribute('placeholder')}</strong> <i class="fas fa-arrow-left"></i> esta vacio..!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>`;
                    document.querySelector(id).focus();
                setTimeout(() => {
                    statusResult.innerHTML = '';
                }, 3500);
            }, 3500);
            throw new Error("empty fields!");
        }
    }

    await fetch('core/route/endPointInventory.php', {
        method: 'POST',
        body: formulario,
      })
      .then(res => res.json())
      .then(response => {
            statusResult.innerHTML = `
                <div class="alert alert-success text-center" role="alert">
                    ¡Los datos han sido enviados <strong>correctamente</strong>..!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>`;
            formInventory.reset();
            setTimeout(() => {
                statusResult.innerHTML = '';
                document.querySelector('#descrip-product').focus();
            }, 3500);

            var tr = document.querySelector('#no_rows');
            tr ? tr.setAttribute('class', 'd-none') : false;
            const [year, month, day] = [...response.warranty_date.split('-')];
            articleAdd.innerHTML += `
                <tr>
                    <td class="text-center"><img src="https://api.qrserver.com/v1/create-qr-code/?data=${response.code_qr}&amp;size=100x100" alt="${response.descrip_product}" title="${response.marc_product}"></td>
                    <td class="text-center"><b>${response.quantity}</b></td>
                    <td class="text-center"><b>${response.descrip_product} | ${response.marc_product} | ${response.model_product} | ${response.serial_product}</b></td>
                    <td class="text-center"><b>${response.bill_num}</b></td>
                    <td class="text-center"><b>${response.cost_center}</b></td>
                    <td class="text-center"><b>${day + '/' + month + '/' + year}</b></td>
                </tr>`;
            
            console.log('Success:', response);
        })
      .catch(error => console.error('Error: ', error));
}


  


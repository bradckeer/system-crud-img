"use strict";

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
            .catch(error => console.error(error))
})();

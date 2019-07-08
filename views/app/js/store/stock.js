const formData = document.querySelector('#search-article-inventory');
const findThis = document.querySelector('#findThis');
const respuesta = document.querySelector('#response');

formData.addEventListener('submit', getArticleUnic);

async function getArticleUnic(e){
    e.preventDefault();        
    
    const inputSearch = document.querySelector('#code-product').value;

    
    if (inputSearch !== '') {

        const FormuData = new FormData(formData);
    
        await fetch('core/route/endPointUnicArticle.php',{
                method: 'POST',
                body: FormuData
            })
                .then(res => res.json())
                .then(data => {
                    //console.log(data);
                    
                    if (data === false) {
                        respuesta.setAttribute('class', 'text-danger');
                        respuesta.innerHTML = '<i class="fas fa-exclamation-triangle"></i> El código es incorrecto';
                        setTimeout(() => {
                            respuesta.innerHTML = '';
                            document.querySelector('#code-product').focus();
                        }, 3500); 
                    } else {
                        let cat = '';
                    if(data.select_category === "101"){
                        cat = ' Articulo de Oficina ';
                    }else if (data.select_category === "102") {
                        cat = ' Herramienta ';
                    }else if (data.select_category === "103") {
                        cat = ' Computación ';
                    }else if (data.select_category === "104") {
                        cat = ' Linea Blanca ';
                    }else if (data.select_category === "105") {
                        cat = ' Linea Marron ';
                    }
    
                    let departament = ''; let responsable = '';
                    if(data.select_department === "100"){
                        departament = 'Oficina ';
                        responsable = '(Enrique Sanchez)';
                    }else if (data.select_department === "200") {
                        departament = 'Exploraciones (Marco Tapía)';
                        responsable = '(Marco Tapía)';
                    }else if (data.select_department === "300") {
                        departament = 'Sostenibilidad (Claudia Hintze)';
                        responsable = '(Claudia Hintze)';
                    }else if (data.select_department === "400") {
                        departament = 'Medio Ambiente (Claudia Hintze)';
                        responsable = '(Claudia Hintze)';
                    }else if (data.select_department === "500") {
                        departament = 'Seguridad (Walter Saavedra)';
                        responsable = '(Walter Saavedra)';
                    }
    
                    let status = '';
                    if (data.status_availability === "1") {
                        status = 'Disponible';
                        estado = 'text-success';
                    } else {
                        status = 'Desincorporado';
                        estado = 'text-danger';
    
                    }
                    
                    const [yearP, monthP, dayP] = [...data.date_purchase.split('-')];
                    const [yearW, monthW, dayW] = [...data.warranty_date.split('-')];

                    findThis.innerHTML += `<h3><span class="badge badge-pill badge-primary" style="margin-left: 18px;">${cat}</span></h3>
                    <div class="card-content collapde show h-100">
                        <div class="card-group">
                            <div class="card">
                                <div class="row justify-content-center align-self-center">
                                <div class="card-body center">
                                    <img class="img-fluid rounded mx-auto d-block" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4kNYUa4IkumjTdSIHgOLKBo9clDk13GknQPomtVmHy44SQOgN" alt="${data.descrip_product}" style="margin-top: 50%;">
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="">${data.descrip_product} ${data.marc_product}</h1>
                                    </br>
                                    <dl class="row h4">
                                        <dt class="col-sm-3">Modelo:</dt>
                                        <dd class="col-sm-9">${data.model_product}</dd>
                                        <dt class="col-sm-3">Serial:</dt>
                                        <dd class="col-sm-9">${data.serial_product}</dd>
                                        <hr>
                                        <dt class="col-sm-3">Detalle:</dt>
                                        <dd class="col-sm-9">                        
                                        <p><b>Centro de Costo: </b>${data.cost_center}</p>
                                        <p><b>N° Factura: </b>${data.bill_num}</p>
                                        <p><b>Monto: S/. </b>${data.amount}</p>
                                        </dd>
                                        <hr>
                                        <dt class="col-sm-3">Fechas:</dt>
                                        <dd class="col-sm-9">                        
                                        <p><b>Compra: </b>${dayP + '/' + monthP + '/' + yearP}</p>
                                        <p><b>Garantía: </b>${dayW + '/' + monthW + '/' + yearW}</p>
                                        </dd>
                                        <hr>
                                        <dt class="col-sm-3">Encargado:</dt>
                                        <dd class="col-sm-9">${departament} <p class="text-info">${responsable}</p></dd>
                                        <dt class="col-sm-3">Estatus:</td>
                                        <dd class="col-sm-9 ${estado}">${status}</dd>
                                        <dt class="col-sm-3">Usuario:</td>
                                        <dd class="col-sm-9"${estado} >${data.usuario}</dd>
                                    </dl>               
                                </div>
                            </div>
                            <div class="card d-flex">
                                <div class="row d-flex justify-content-center align-items-center align-self-center" style="position: relative;">
                                    <div class="card-body">
                                        <img class="img-fluid rounded mx-auto d-block " src="https://api.qrserver.com/v1/create-qr-code/?data=${data.code_qr}&size=180x180" alt="" height="180" width="180" style="margin-top: 60%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><hr>`;
    
                    formData.reset();                    
                    respuesta.innerHTML = ''; 
                    respuesta.setAttribute('class', 'text-success');
                    respuesta.innerHTML = '<i class="fas fa-check"></i></i> El código es correcto';
                    }
                    setTimeout(() => {
                        respuesta.innerHTML = '';
                        document.querySelector('#code-product').focus();
                    }, 3500);    
                })
                .catch(error => console.log(error));
    
    
    }else{
        respuesta.setAttribute('class', 'text-danger');
        respuesta.innerHTML = '<i class="fas fa-arrow-left"></i> El campo debe estar lleno';
        setTimeout(() => {
            respuesta.innerHTML = '';
            document.querySelector('#code-product').focus();
        }, 3500); 
    }
}


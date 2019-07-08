<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Inventario</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?view=inventory">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="?view=inventory">Page</a>
                </li>
                <li class="breadcrumb-item active">Ingreso de activo
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Form wizard with icon tabs section start -->
        <section id="icon-tabs">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title mt-2">Ingresar un artículo al inventario</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                      <li><a data-action="reload"><i class="fas fa-sync-alt"></i></a></li>
                      <li><a data-action="expand"><i class="far fa-window-maximize"></i></a></li>
                      <li><a data-action="close"><i class="fas fa-times"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form id="insert-article-inventory" class="needs-validation" >
                      <div class="form-row">
                        <div class="form-group col-6">
                          <label for="descrip-product">Descripción</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-info"></i></div>
                            </div>
                            <input type="text" class="form-control" name="descrip-product" id="descrip-product" placeholder="Descripción" require>
                          </div>
                        </div>
                        <div class="form-group col-2">
                          <label for="marc-product">Marca</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="far fa-copyright"></i></div>
                            </div>
                            <input type="text" class="form-control" name="marc-product" id="marc-product" placeholder="Marca" require>
                          </div>
                        </div>
                        <div class="form-group col-2">
                          <label for="model-produc">Modelo</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="far fa-clone"></i></div>
                            </div>
                            <input type="text" class="form-control" name="model-product" id="model-product" placeholder="Modelo" require>
                          </div>
                        </div>
                        <div class="form-group col-2">
                          <label for="serial-produc">Serial</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-code"></i></div>
                            </div>
                            <input type="text" class="form-control" name="serial-product" id="serial-product" placeholder="Serial" require>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-6">
                        <label for="select-category">Categorías</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                              <select class="custom-select custom-select-sm" name="select-category" id="select-category" placeholder="Categorías" require>
                                <option value="" selected>Selecciona una categoría</option>
                                <option value="101">Artículo de ofcina</option>
                                <option value="102">Herramienta</option>
                                <option value="103">Computación</option>
                                <option value="104">Linea blanca</option>
                                <option value="105">Linea marron</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-2">
                          <label for="date-purchase">Fecha de Compra</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                            <input type="date" class="form-control" name="date-purchase" id="date-purchase" placeholder="Fecha de Compra" require>
                          </div>  
                        </div>
                        <div class="form-group col-2">
                          <label for="bill-num">N° Factura</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-file-invoice"></i></div>
                            </div>
                            <input type="text" class="form-control" name="bill-num" id="bill-num" placeholder="N° Factura" require>
                          </div>  
                        </div>
                        <div class="form-group col-2">
                          <label for="quantity">Cantidad</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-hashtag"></i></div>
                            </div>
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Cantidad" min="1" require>
                          </div> 
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-6">
                        <label for="select-department">Departamento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                              <select class="custom-select custom-select-sm" name="select-department" id="select-department" placeholder="Departamento" require>
                                <option value="" selected>Selecciona una departamento</option>
                                <option value="100">Oficina</option>
                                <option value="200">Exploraciones</option>
                                <option value="300">Sostenibilidad</option>
                                <option value="400">Medio Ambiente</option>
                                <option value="500">Seguridad</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-2">
                          <label for="cost-center">Centro de Costo</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-hand-holding-usd"></i></div>
                            </div>
                            <input type="text" class="form-control" name="cost-center" id="cost-center" placeholder="Centro de Costo" require>
                          </div>  
                        </div>
                        <div class="form-group col-2">
                          <label for="warranty-date">Fecha de Garantía</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-award"></i></div>
                            </div>
                            <input type="date" class="form-control" name="warranty-date" id="warranty-date" placeholder="Fecha de Garantía" require>
                          </div>  
                        </div>
                        <div class="form-group col-2">
                          <label for="amount">Monto</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                            </div>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Monto" step="0.01" min="0.01" require>
                          </div> 
                        </div>
                        <div class="form-group col-12">
                          <label for="amount">Usuario</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                              </div>
                              <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ususario"  require>
                            </div> 
                        </div>
                      </div>
                      <div class="page__toggle">
                        <label class="toggle">
                          <input class="toggle__input" type="checkbox" name="condition-new" id="condition-new" value="1" checked>
                          <span class="toggle__label">
                            <span class="toggle__text">&nbsp&nbspArtículo nuevo</span>
                          </span>
                        </label>&nbsp&nbsp
                        <label class="toggle">
                          <input class="toggle__input" type="checkbox" name="condition-used" id="condition-used" value="2">
                          <span class="toggle__label">
                            <span class="toggle__text">&nbsp&nbspArtículo usado</span>
                          </span>
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm float-right mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agragar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>        
        <div id="status_result"></div>
      </div>
      <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mt-2">Artículo agregado recientemente - (hoy)</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard ">
                    <p class="card-text">Total de items <em>agregados</em> recientemente: <span class="badge badge-pill badge-info bg-primary text-white p-1" id="total"></span >   Estos "items" sólo permanecerán visibles en esta área 24 hrs.</p>
                </div>
                <div class="table-responsive pl-2 pr-2">
                    <table class="table mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fas fa-qrcode"></i></th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Resumen</th>
                                <th class="text-center">N° Factura</th>
                                <th class="text-center">Centro de Costo</th>
                                <th class="text-center">Garantía</th>
                            </tr>
                        </thead>
                        <tbody id="article_add">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="views/app/js/store/inventory.js"></script>

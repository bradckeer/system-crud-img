  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Inventario</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?view=index">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="?view=assets">Page</a>
                </li>
                <li class="breadcrumb-item active">Buscar de activo
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
                    <form id="search-article-inventory" class="needs-validation" >
                      <div class="form-row">
                        <div class="form-group col-6">
                          <label for="code-produc">Buscar por código QR</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class='fas fa-qrcode'></i></div>
                            </div>
                            <input type="text" class="form-control" name="code-product" id="code-product" placeholder="Ingresar código" require>
                            &nbsp;&nbsp;&nbsp;
                            <span class="badge badge-light" id="response" style="padding: 6px 2px 2px 2px;"></span>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm float-right mb-3"><i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Buscar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="content-body">
        <section id="icon-tabs">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title mt-2">Aquí se mostrará lo que buscas.</h4>
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
                <div id="findThis"></div>                         
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<script src="views/app/js/store/stock.js"></script>

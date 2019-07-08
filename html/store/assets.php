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
                <li class="breadcrumb-item active">Ingreso de activo
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mt-2">Lista de activos</h4>
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
                  <p class="card-text">Total de items: <span class="badge badge-pill badge-info bg-primary text-white p-1" id="totalList"></span >
                  <form id="filter-item" method="post">
                    <input class="float-right" type="search" name="search-item" id="search-item" value="" placeholder="Buscar..." >
                  </form>
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
                        <tbody id="activos">                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="views/assets/js/scripts/qrcode/qrcode.js"></script>
  <script src="views/app/js/store/assets.js"></script>
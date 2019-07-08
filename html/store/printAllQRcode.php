<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Códigos QR</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?view=inventory">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="?view=stock">Page</a>
                </li>
                <li class="breadcrumb-item active">Imprimir actico
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mt-2">Lista de Códigos QR para imprimir</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
                <button id="printButton" class="btn btn-lg btn-info float-right m-4 "><i class="fas fa-print"></i></button>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard ">
                    <div class="d-flex align-content-stretch flex-wrap" id="AllQRCode">
                        
                    </div>
                </div>                
            </div>
        </div>
      </div>
    </div>
</div>
<script src="views/app/js/store/printAllQrCode.js"></script>">
<!--   p-2 bd-highlight -->
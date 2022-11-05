<?php
require_once 'includes/header.php';
?>
 <main class="app-content ">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Biblioteca</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Biblioteca</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile modi">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablebiblioteca">
                  <thead>
                    <tr class="text-white">
                     
                      <th "text-white">ID</th>
                      <th>TITULO</th>
                      <th>TIPO</th>
                      <th>AUTOR</th>
                      <th>EDITORIAL</th>
                      <th>AÑO</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>
                  <tbody class="text-white">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php
require_once 'includes/footer.php';
?>
<section class="content-header">
    <h1>
        Buscar Venda
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Buscar Venda</a></li>

    </ol>
</section>
<section class="content">
    <div class="box box-primary">
        <form method="post" id="buscaVenedaFiltro">
            <div class="box-body">
                <div class="form-group col-md-4">
                    <label>Data Inicio:</label>
                    <input type="text" id="dt_ini" name="dt_ini"  class="form-control dt" required="true">
                </div>
                <div class="form-group col-md-4">
                    <label>Data Fim:</label>
                    <input type="text" id="dt_fim" name="dt_fim"  class="form-control dt" required="true">
                </div>
                <div class="form-group col-lg-4" id="clientes">
                    <label>Cliente :</label>
                </div>
                <div class="box-footer col-md-12">
                    <button class="btn btn-primary" ><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="box box-primary">
        <div class="box-body">
            <div id="callback"></div>
        </div>
    </div>
    

</section>
<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<section class="content-header">
    <h1>
        Produtos
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Venda</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body ">
                    <div id="callback"></div>
                    <form id="formAddVenda" method="post" >

                        <div class="box-body">
                            <div class="form-group col-lg-6" id="clientes">
                                <label>Cliente :</label>
                            </div>


                            <div class="form-group col-lg-12" id="div_protudo"></div>
                            <br><br>
                            <div class="form-group col-lg-12">
                                <span id="bt_add" class="btn btn-info pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Produto </span>
                            </div>


                            <div class="modal-footer col-md-12">
                                <button  class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Venda</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</section>



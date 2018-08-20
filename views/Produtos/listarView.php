<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<section class="content-header">
    <h1>
        Produtos
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Produtos</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body ">
                    <button class="btn btn-info" id="btnAddProduto" href=""><i class="fa fa-plus"></i> Novo Produto</button>
                    <br><br>
                    <div id="getListaProdutos"></div>
                    <div id="callback"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="myModalAcoes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Ipê  Digital</h3>

            </div>
            <div class="modal-body">
                <div id="divAlerta"></div>
                <div class="with-nav-tabs">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Editar</a></li>
                        <li id="litab2default"><a href="#tab2default" data-toggle="tab">Remover Produto</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <form id="formEditProduto" method="post" >

                                <div class="box-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group col-lg-12" >
                                        <label>Descrição :</label>
                                        <textarea name="descricaoEdt" id="descricaoEdt" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Referência :</label>
                                        <input type="text" name="referenciaEdt" id="referenciaEdt" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Marca :</label>
                                        <input type="text" name="marcaEdt" id="marcaEdt" class="form-control contato1" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Preço :</label>
                                        <input type="text" name="precoEdt" id="precoEdt" class="form-control dinheiro" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Estoque :</label>
                                        <input type="text" name="estoqueEdt" id="estoqueEdt" class="form-control" required="true">
                                    </div>


                                    <div class="form-group col-lg-6" >
                                        <label>Unidade De Venda :</label>
                                        <input type="text" id="unidade_de_vendaEdt" name="unidade_de_vendaEdt" class="form-control" required="true">
                                    </div>


                                    <div class="modal-footer col-md-12">
                                        <button  class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Editar Produto</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab2default">

                            <div class="box-body">
                                <div class="alert alert-danger" role="alert">
                                    <b>Deseja realmente remover Produto ?</b>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button  class="btn btn-primary" id="inativarProduto"><i class="fa fa-floppy-o" aria-hidden="true"></i> Remover Produto</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalAddProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Ipê  Digital</h3>

            </div>
            <div class="modal-body">
                <div id="divAlerta"></div>
                <div class="with-nav-tabs">
                    <ul class="nav nav-tabs" id="myTabAdd">
                        <li class="active"><a href="#tab1defaultAdd" data-toggle="tab">Adicionar</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active">
                            <form id="formAddProduto" method="post" >

                                <div class="box-body">
                                    <div class="form-group col-lg-12" >
                                        <label>Descrição :</label>
                                        <textarea name="descricao" id="descricao" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Referência :</label>
                                        <input type="text" name="referencia" id="referencia" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Marca :</label>
                                        <input type="text" name="marca" id="marca" class="form-control contato1" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Preço :</label>
                                        <input type="text" name="preco" id="preco" class="form-control dinheiro" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Estoque :</label>
                                        <input type="text" name="estoque" id="estoque" class="form-control" required="true">
                                    </div>


                                    <div class="form-group col-lg-6" >
                                        <label>Unidade De Venda :</label>
                                        <input type="text" id="unidade_de_venda" name="unidade_de_venda" class="form-control" required="true">
                                    </div>


                                    <div class="modal-footer col-md-12">
                                        <button  class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adicionar Produto</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>

                                </div>
                            </form>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







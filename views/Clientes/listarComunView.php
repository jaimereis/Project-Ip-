<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<section class="content-header">
    <h1>
        Clientes
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Clientes</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body ">
                    <button class="btn btn-info" id="btnAddCliente" href=""><i class="fa fa-plus"></i> Novo Cliente</button>
                    <br><br>
                    <div id="getListaComunClientes"></div>
                    <div id="callback"></div>
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
                        <li id="litab2default"><a href="#tab2default" data-toggle="tab">Remover Cliente</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <form id="formEditCliente" method="post" >

                                <div class="box-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group col-lg-6" >
                                        <label>Nome :</label>
                                        <input type="text" name="nome" id="nome" class="form-control" required="true">
                                    </div>


                                    <div class="form-group col-lg-6" >
                                        <label>CPF / CNPJ :</label>
                                        <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>E-mail :</label>
                                        <input type="text" name="email" id="email" class="form-control contato1" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>CEP :</label>
                                        <input type="text" name="cep" id="cep" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Localidade :</label>
                                        <input type="text" name="localidade" id="localidade" class="form-control" required="true">
                                    </div>


                                    <div class="form-group col-lg-6" >
                                        <label>Estado :</label>
                                        <input type="text" id="estado" name="estado" class="form-control" required="true">
                                    </div>
                                    
                                    <div class="form-group col-lg-6" >
                                        <label>Logradouro :</label>
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Bairro :</label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Numero :</label>
                                        <input type="text" id="numero" name="numero" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Telefone 1 :</label>
                                        <input type="text" id="telefone1" name="telefone1" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Telefone 2 :</label>
                                        <input type="text" id="telefone2" name="telefone2" class="form-control" >
                                    </div>

                                    <div class="box-footer col-md-12">
                                        <button  class="btn btn-primary pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Edição</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab2default">
                            
                                <div class="box-body">
                                    <div class="alert alert-danger" role="alert">
                                        <b>Deseja realmente remover Cliente ?</b>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button  class="btn btn-primary" id="inativarCliente"><i class="fa fa-floppy-o" aria-hidden="true"></i> Remover Cliente</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalAddCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <li class="active"><a href="#tab1defaultAdd" data-toggle="tab">Editar</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active">
                            <form id="formAddCliente" method="post" >

                                <div class="box-body">
                                    <div class="form-group col-lg-6" >
                                        <label>Nome :</label>
                                        <input type="text" name="nomeAdd" id="nomeAdd" class="form-control" required="true">
                                    </div>


                                    <div class="form-group col-lg-6" >
                                        <label>CPF / CNPJ :</label>
                                        <input type="text" id="cpf_cnpjAdd" name="cpf_cnpjAdd" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>E-mail :</label>
                                        <input type="text" name="emailAdd" id="emailAdd" class="form-control contato1" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>CEP :</label>
                                        <input type="text" name="cepAdd" id="cepAdd" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Localidade :</label>
                                        <input type="text" name="localidadeAdd" id="localidadeAdd" class="form-control" required="true">
                                    </div>


                                    <div class="form-group col-lg-6" >
                                        <label>Estado :</label>
                                        <input type="text" id="estadoAdd" name="estadoAdd" class="form-control" required="true">
                                    </div>
                                    
                                    <div class="form-group col-lg-6" >
                                        <label>Logradouro :</label>
                                        <input type="text" id="logradouroAdd" name="logradouroAdd" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Bairro :</label>
                                        <input type="text" id="bairroAdd" name="bairroAdd" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Numero :</label>
                                        <input type="text" id="numeroAdd" name="numeroAdd" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Telefone 1 :</label>
                                        <input type="text" id="telefone1Add" name="telefone1Add" class="form-control" required="true">
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label>Telefone 2 :</label>
                                        <input type="text" id="telefone2Add" name="telefone2Add" class="form-control" >
                                    </div>

                                    <div class="modal-footer col-md-12">
                                        <button  class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adicionar Cliente</button>
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







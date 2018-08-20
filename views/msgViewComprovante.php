<!--<a type="button"  data-toggle="modal" data-target="#myModal"></a>-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ipê Digital</h4>
            </div>
            <div class="modal-body">
                <div class="box-body" style="color: <?php echo $color; ?>;">
                    <h4 class="modal-title" id="myModalLabel"><b id="msg"><?php if(isset($msg)){ echo $msg; } ?></b><b><?php if(isset($id)){ echo $id; } ?></b></h4>
                    <table id='table' class='table table-bordered table-striped' >
                        <tr>
                        <td>ID</td>
                        <td>ITEM</td>
                        <td>PREÇO UNITÁRIO</td>
                        <td>QUANTIDADE</td>
                        <td>TOTAL DESTE ITEM</td>
                        </tr>
                        <?php foreach ($dadosCompra as $p): ?>
                        <tr>
                            <td><?php echo $p['id'];?></td>
                            <td><?php echo $p['descricao'];?></td>
                            <td><?php echo $p['preco'];?></td>
                            <td><?php echo $p['qtd'];?></td>
                            <td><?php echo $p['total_item'];?></td>
                        </tr>
                        
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Valor Total da compra: R$ <?php echo $valorFinal; ?></td>
                        </tr>
                    </table>
                </div>
                <div id="conteudo_RecuperarSenha"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>



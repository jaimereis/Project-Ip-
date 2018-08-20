<div class="col-lg-4 form-group" >
    <label>Produto: </label>
    <select class="form-control" name="prod[]" required="true">
        <option></option>
        <?php foreach ($produtos as $p): ?>
            <option value="<?php echo $p['id']; ?>"><?php echo strtoupper($p['descricao']); ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="col-lg-4 form-group">
    <label>Quantidade: </label>
    <input type="text"  name="qtd[]" class="form-control">
</div>










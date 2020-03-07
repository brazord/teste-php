<?php include_once dirname(__DIR__).'../Shared/inc_header.php'; ?>

    <?php if(isset($_GET["retorno"])): ?>
        
        <?php if($_GET["retorno"] == -1): ?>
            <div class="alert alert-danger">Falha</div>
        <?php else:?>
            <div class="alert alert-success">Sucesso</div>
        <?php endif?>

    <?php endif?>

    <form method="post" action="<?=site_url('veiculo/gravar')?>">
        
        <h2>Veiculos</h2>

        <label for="codigo_cliente">Proprietário</label>
        <select name="codigo_cliente" id="codigo_cliente" class="form-control">
            <?php foreach ($clientes as $cliente):?>
                <option value="<?=$cliente["codigo"]?>"><?=$cliente["codigo"].' - '.$cliente["nome"]?></option>
            <?php endforeach?>
        </select>

        <label for="placa">Placa</label>
        <input type="text" name="placa" id="placa" class="form-control"/>

        <label for="renavam">Renavam</label>
        <input type="text" name="renavam" id="renavam" class="form-control"/>

        <label for="fabricante">Fabricante</label>
        <input type="text" name="fabricante" id="fabricante" class="form-control"/>

        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" id="modelo" class="form-control"/>

        <label for="ano">Ano</label>
        <input type="number" name="ano" id="ano" class="form-control"/>

        <br>

        <input type="submit" value="Gravar" class="btn btn-primary"/>

    </form>

    <br/>

    <?php if(Count($veiculos) > 0):?>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Placa</td>
            <td>Renavam</td>
            <td>Fabricante</td>
            <td>Modelo</td>
            <td>Ano</td>
            <td>Proprietário</td>
        </tr>
        <?php foreach ($veiculos as $veiculo):?>
            <tr>
                <td><?=$veiculo["placa"]?></td>
                <td><?=$veiculo["renavam"]?></td>
                <td><?=$veiculo["fabricante"]?></td>
                <td><?=$veiculo["modelo"]?></td>
                <td><?=$veiculo["ano"]?></td>
                <td><?=$veiculo["nome"]?></td>
            </tr>
        <?php endforeach?>
    </table>
    <?php endif;?>
    
<?php include_once dirname(__DIR__).'../Shared/inc_footer.php'; ?>
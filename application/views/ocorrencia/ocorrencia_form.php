<?php include_once dirname(__DIR__).'../Shared/inc_header.php'; ?>

    <?php if(isset($_GET["retorno"])): ?>
        
        <?php if($_GET["retorno"] == -1): ?>
            <div class="alert alert-danger">Falha</div>
        <?php else:?>
            <div class="alert alert-success">Sucesso</div>
        <?php endif?>

    <?php endif?>

    <form method="post" action="<?=site_url('ocorrencia/gravar')?>">
        
        <h2>Ocorrências</h2>
        <label for="placa">Veículo</label>
        <select name="placa" id="placa" class="form-control">
            <?php foreach ($veiculos as $veiculos):?>
                <option value="<?=$veiculos["placa"]?>"><?=$veiculos["placa"].' - '.$veiculos["modelo"]?></option>
            <?php endforeach?>
        </select>

        <label for="data">Data</label>
        <input type="date" name="data" id="data" class="form-control"/>

        <label for="local">Local</label>
        <input type="text" name="local" id="local" class="form-control"/>

        <label for="cpf">Descrição</label>
        <textarea name="descricao" id="descrocap" class="form-control"></textarea>

        <br>

        <input type="submit" value="Gravar" class="btn btn-primary"/>
    </form>

    <br>

    <?php if(Count($ocorrencias) > 0):?>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Data</td>
            <td>Local</td>
            <td>Descrição</td>
            <td>Modelo</td>
            <td>Proprietário</td>
        </tr>
        
        <?php foreach ($ocorrencias as $ocorrencia):?>
            <tr>
                <td><?=$ocorrencia["DATA"]?></td>
                <td><?=$ocorrencia["LOCAL"]?></td>
                <td><?=$ocorrencia["descricao"]?></td>
                <td><?=$ocorrencia["modelo"]?></td>
                <td><?=$ocorrencia["nome"]?></td>
            </tr>
        <?php endforeach?>
    </table>
    <?php endif;?>

<?php include_once dirname(__DIR__).'../Shared/inc_footer.php'; ?>
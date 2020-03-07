<?php include_once dirname(__DIR__).'../Shared/inc_header.php'; ?>

    <?php if(isset($_GET["retorno"])): ?>
        
        <?php if($_GET["retorno"] == -1): ?>
            <div class="alert alert-danger">Falha</div>
        <?php else:?>
            <div class="alert alert-success">Sucesso</div>
        <?php endif?>

    <?php endif;?>


    <form method="post" action="<?=$this->acao;?>">
        
        <h2>Cliente</h2>
        <input type="hidden" name="codigo" id="codigo" class="form-control" value="<?=$this->codigo?>"/>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="<?=$this->nome?>"/>

        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" class="form-control" value="<?=$this->rg?>"/>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control" value="<?=$this->cpf?>"/>

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" class="form-control" value="<?=$this->endereco?>"/>
            
        <br>

        <?php if($this->router->fetch_method() == 'index'):?>
            <input type="submit" value="Gravar" class="btn btn-primary"/>
        <?php else:?>
            <input type="submit" value="Alterar" class="btn btn-danger"/>
        <?php endif;?>

    </form>

    <br/>
    
    <?php if(isset($clientes) && Count($clientes) > 0):?>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Código</td>
            <td>Nome</td>
            <td>RG</td>
            <td>CPF</td>
            <td>Endereço</td>
        </tr>
        <?php foreach ($clientes as $cliente):?>
            <tr>
                <td><?=$cliente["codigo"]?></td>
                <td><a href="<?=site_url('cliente/detalhar/'.$cliente["codigo"])?>" title="Detalhar cliente"><?=$cliente["nome"]?></a></td>
                <td><?=$cliente["rg"]?></td>
                <td><?=$cliente["cpf"]?></td>
                <td><?=$cliente["endereco"]?></td>
            </tr>
        <?php endforeach?>
    </table>
    <?php endif;?>
        
    <?php if(isset($veiculos) && Count($veiculos) > 0 && $veiculos[0] != NULL):?>
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
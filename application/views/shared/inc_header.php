<!DOCTYPE html>
<html>
<head>
    <title><?=isset($title) ? $title : 'Rodrigo Braz Rodrigues - Teste '?></title>
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <li><a href="<?=site_url("Cliente")?>">Cliente</a></li>
            <li><a href="<?=site_url("Veiculo")?>">Veiculo</a></li>
            <li><a href="<?=site_url("Ocorrencia")?>">Ocorrência</a></li>
        </ul>
    </nav>
    <div class="container">
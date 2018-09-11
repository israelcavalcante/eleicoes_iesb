<?php
include_once 'Municipio.php';

$municipio = new Municipio();

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_municipio'])) {
            $municipio->alterar($_POST);
        } else {
            $municipio->inserir($_POST);
        }
        break;
    case 'excluir':
        $municipio->excluir($_GET['id_municipio']);
        break;


    case 'buscar_municipio':
        $municipios = $municipio->buscar_municipio($_GET['id_uf']);
        foreach ($municipios as $amunicipios) {
            echo "<option value='{$amunicipios['id_municipio']}'>{$amunicipios['nome']}</option>";

        }
        die;
        break;
};

header('location: index.php');
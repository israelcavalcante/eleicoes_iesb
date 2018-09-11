<?php
/**
 * Processando os dados de Eleitor
 * 
 */
include_once 'Eleitor.php';
include_once '../municipio/Municipio.php';

$eleitor = new eleitor();
$municipio = new Municipio();

switch ($_GET['acao']) {
    case 'salvar':

        $origem = $_FILES['foto']['tmp_name'];
        $destino = '../upload/eleitor/' . $_FILES['foto']['name'];
        move_uploaded_file($origem, $destino);

        if (!empty($_POST['id_eleitor'])) {
            $eleitor->alterar($_POST);
        } else {
            $eleitor->inserir($_POST);
        }
        break;
    case 'excluir':
        $eleitor->excluir($_GET['id_eleitor']);

        break;
    case 'verificar_titulo':
        $existe = $eleitor->existeTitulo($_GET['titulo']);

        if ($existe) {
            echo "O titulo {$_GET['titulo']} já existe informe outro.";
        }
        die;
    case 'verificar_nome':

        $existe = $eleitor->existeNome($_GET['nome']);
        if ($existe) {
            echo "Existe $existe no banco cadastradas...";
        }

        die;

}





header('location: index.php');
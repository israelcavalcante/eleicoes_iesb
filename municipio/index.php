<?php
include_once 'Municipio.php';

$municipios = new Municipio();
$aMunicipio = $municipios->recuperarDados();

include_once '../cabecalho.php';
?>
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Município</h3>
        </div>
    </div>
</div>

<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <a class="btn btn-warning" href="formulario.php">Novo</a>
            </div>
            <div class="panel-body">
                <div class="responsive-table">

                    <table id="datatables-example"
                           class="table table-bordered table-hover table-striped table-condensed">
                        <thead>
                        <tr>
                            <th colspan="2" width="10%" style="text-align: center">Ações</th>
                            <th>Nome</th>
                            <th>UF</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($aMunicipio as $municipio) {
                            echo "
                                    <tr>
                                        <td>
                                            <a href='formulario.php?id_municipio={$municipio['id_municipio']}'><span class='icons icon-note'></span></a>
                                        </td>
                                        <td>
                                            <a href='processamento.php?acao=excluir&id_municipio={$municipio['id_municipio']}'><span class='fa fa-trash-o'></span></a>
                                        </td>
                                        <td>{$municipio['nome']}</td>
                                        <td>{$municipio['id_uf']}</td>
                                    </tr>
                                ";
                        } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../rodape.php';
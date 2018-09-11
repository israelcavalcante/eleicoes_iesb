<?php
// Incluindo a classe de Eleitor
include_once 'Eleitor.php';
$eleitor = new Eleitor();
// incluindo os municipios
include_once '../municipio/Municipio.php';
$municipio = new Municipio();
// incluindo as UFs
include_once '../uf/Uf.php';
$uf = new Uf();
// Recuprando os dados de municipio
$municipios = $municipio->recuperarDados();
// Recuprando os dados de ufs
$ufs = $uf->recuperarDados();
// Decidindo se ira atualizar ou inserir
if (!empty($_GET['id_eleitor'])) {
    $eleitor->carregarPorId($_GET['id_eleitor']);
}
// Incluindo o inicio da aplicação
include_once '../cabecalho.php';
?>
<!-- Criando o Formulario de eleitor -->
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft"><span class="fa fa-users"></span> Eleitores</h3>
        </div>
    </div>
</div>
<div class="col-md-offset-1 col-md-10 panel">
    <div id="mensagem" role="alert"></div>
    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
        <!--Primeira coluna do Formulário  -->
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="processamento.php?acao=salvar" method="post" class="form-horizontal">
                <!-- ID do eleitor -->
                <input type="hidden" name="id_eleitor" value="<?php echo $eleitor->getId_eleitor(); ?>">
                <!-- Nome -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="nome" name="nome" required
                           value="<?php echo $eleitor->getNome(); ?>">
                    <div id="mensagemNome" role="alert"></div>
                    <span class="bar"></span>
                    <label> <i class="fa fa-user"></i> Nome</label>
                </div>
                <!-- Titulo -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="titulo" name="titulo" required
                           value="<?php echo $eleitor->getTitulo(); ?>">
                    <span class="bar"></span>
                    <label> <i class="icons icon-credit-card"></i> Titulo</label>
                </div>
                <!-- Zona -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="zona" name="zona" required
                           value="<?php echo $eleitor->getZona(); ?>">
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i> Zona</label>
                </div>
                <!-- Seção -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="secao" name="secao" required
                           value="<?php echo $eleitor->getSecao(); ?>">
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i> Seção</label>
                </div>
                <!-- telefone -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="tel" class="form-text" id="telefone" name="telefone" required
                           value="<?php echo $eleitor->getTelefone(); ?>">
                    <span class="bar"></span>
                    <label> <i class="fa fa-mobile-phone"></i> Telefone</label>
                </div>
                <!-- Foto -->
                <div class="form-group" style="margin-top:40px !important;">
                    <label> <i class="fa fa-file-photo-o"></i> Foto</label>
                    <input type="file" class="form-text" id="foto" name="foto" required
                           value="<?php echo $eleitor->getFoto(); ?>">
                </div>
        </div>
        <!-- Segunda coluna do Formulário -->
        <div class="col-md-6">
            <!-- CEP -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="cep" name="cep" required
                       value="<?php echo $eleitor->getCep(); ?>">
                <span class="bar"></span>
                <label> <i class="icons icon-map"></i> CEP</label>
            </div>
            <!-- UF -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <select class="form-text" name="uf" id="uf">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($ufs as $aufs) { ?>

                        <option value="<?= $aufs['id_uf'] ?>"><?= $aufs['nome'] ?></option>

                    <?php } ?>
                </select>
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> UF</label>
            </div>
            <!-- Município -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <select class="form-text" name="municipio" id="municipio">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($municipios as $amunicipios) { ?>

                        <option value="<?= $amunicipios['id_municipio'] ?>"><?= $amunicipios['nome'] ?></option>

                    <?php } ?>
                </select>
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> Município</label>
            </div>
            <!-- logradouro -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="logradouro" name="logradouro" required
                       value="<?php echo $eleitor->getLogradouro(); ?>">
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> Logradouro</label>
            </div>
            <!-- bairro -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="bairro" name="bairro" required
                       value="<?php echo $eleitor->getBairro(); ?>">
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> Bairro</label>
            </div>
            <!-- numero_endereco -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="numero_endereco" name="numero_endereco" required
                       value="<?php echo $eleitor->getNumero_endereco(); ?>">
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> Numero Endereco</label>
            </div>
            <!-- complemento -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="complemento" name="complemento"
                       value="<?php echo $eleitor->getComplemento(); ?>">
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> Complemento</label>
            </div>
            <!-- id_municipio-->
            <input type="hidden" class="form-text" id="id_municipio" name="id_municipio" required
                   value="<?php echo $eleitor->getId_municipio(); ?>">


            <!-- Enviando ou cancelando o Envio -->

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><span class="fa fa-thumbs-o-up"> </span> Salvar
                    </button>
                    <a class="btn btn-danger" href="index.php"><span class="fa fa-reply"> </span> Voltar</a>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
<?php
include_once '../location/scriptCEP.php';
// Incluindo o termino da aplicação
include_once '../rodape.php';
?>

<script>
    $(function () {
        // AJAX para verificação do título
        $('#titulo').change(function () {
            $.ajax({
                url: 'processamento.php?acao=verificar_titulo&titulo=' + $('#titulo').val(),
                success: function (dados) {
                    $('#mensagem').html(dados);
                }
            });
            // Verificação em JQUERY Load
            // $('#mensagem').load('processamento.php?acao=verificar_titulo&titulo=' + $('#titulo').val());
        });
        // AJAX para verificação do nome
        $('#nome').change(function () {
            $.ajax({
                url: 'processamento.php?acao=verificar_nome&' + $('#nome').serialize(),
                success: function (dados) {
                    $('#mensagemNome').html(dados);
                }
            });
            // Verificação em JQUERY Load
            // $('#mensagemNome').load('processamento.php?acao=verificar_nome&nome=' + $('#nome').val());
        });
        // AJAX para preenchimento do combo Municípios
        $('#uf').change(function () {
            $.ajax({
                url: '../municipio/processamento.php?acao=buscar_municipio&id_uf=' + $('#uf').val(),
                success: function (dados) {
                    $('#municipio').html(dados);
                }
            });
            // Preenchimento do combo Municípios em JQUERY Load
            // $('#municipio').load('../municipio/processamento.php?acao=preenche_combo&id_uf=' + $('#uf').val());
        })
    })
</script>
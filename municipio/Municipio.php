<?php

include_once '../Conexao.php';

class Municipio{

    protected $id_municipio;
    protected $nome;
    protected $id_uf;

    public function getIdMunicipio(){
        return $this->id_municipio;
    }

    public function setIdMunicipio($id_municipio){
        $this->id_municipio = $id_municipio;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getIdUf(){
        return $this->id_uf;
    }

    public function setIdUf($id_uf){
        $this->id_uf = $id_uf;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from municipio order by nome";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_municipio)
    {
        $conexao = new Conexao();

        $sql = "select * from municipio where id_municipio = $id_municipio";
        $dados = $conexao->recuperarDados($sql);
        
        $this->id_municipio = $dados[0]['id_municipio'];
        $this->nome = $dados[0]['nome'];
        $this->id_uf = $dados[0]['id_uf'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $id_uf = $dados['id_uf'];

        $conexao = new Conexao();

        $sql = "insert into municipio (nome, id_uf)
                            values ('$nome', '$id_uf')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_municipio = $dados['id_municipio'];
        $nome = $dados['nome'];
        $id_uf = $dados['id_uf'];

        $conexao = new Conexao();

        $sql = "update municipio set

        nome = '$nome',
        id_uf = '$id_uf'
        
        where id_municipio = $id_municipio";

        return $conexao->executar($sql);
    }

    public function excluir($id_municipio)
    {
        $conexao = new Conexao();

        $sql = "delete from municipio where id_municipio = $id_municipio";
        return $conexao->executar($sql);
    }
    public function buscar_municipio($id_uf){

        $conexao = new Conexao();

        $sql = "select * from municipio where id_uf = '$id_uf'";
        return $conexao->recuperarDados($sql);
    }


};
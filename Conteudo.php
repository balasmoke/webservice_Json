<?php
include '../../Conexao.php';

class Conteudo extends Conexao{
	private $id;
    private $nome;
    private $preco;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    public function insert($obj){
    	$sql = "INSERT INTO produtos(nome,preco) VALUES (:nome,:preco)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('preco' , $obj->preco);
    	return $consulta->execute();

	}

	public function update($obj,$id = null){
		$sql = "UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('nome', $obj->nome);
		$consulta->bindValue('preco', $obj->preco);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM produtos WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
	}

	public function find($id = null){

	}

	public function findAll(){
		$sql = "SELECT * FROM produtos";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>
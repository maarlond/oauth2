<?php
class Usuario{

    public $id;
    public $nome;
    public $codOrganizacao;
    public $temAcesso;
    public $codAntigo;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of codOrganizacao
     */ 
    public function getCodOrganizacao()
    {
        return $this->codOrganizacao;
    }

    /**
     * Set the value of codOrganizacao
     *
     * @return  self
     */ 
    public function setCodOrganizacao($codOrganizacao)
    {
        $this->codOrganizacao = $codOrganizacao;

        return $this;
    }

    /**
     * Get the value of temAcesso
     */ 
    public function getTemAcesso()
    {
        return $this->temAcesso;
    }

    /**
     * Set the value of temAcesso
     *
     * @return  self
     */ 
    public function setTemAcesso($temAcesso)
    {
        $this->temAcesso = $temAcesso;

        return $this;
    }

    /**
     * Get the value of codAntigo
     */ 
    public function getCodAntigo()
    {
        return $this->codAntigo;
    }

    /**
     * Set the value of codAntigo
     *
     * @return  self
     */ 
    public function setCodAntigo($codAntigo)
    {
        $this->codAntigo = $codAntigo;

        return $this;
    }
}
?>
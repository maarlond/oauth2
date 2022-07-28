<?php
class Usuario
{

    public $id;
    public $nome;
    public $matricula;
    public $rheId;
    public $setor;
    public $organizacao;
    public $codSetor;
    public $codOrganizacao;
    public $dataUltimoLogin;


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
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

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
     * Get the value of rheId
     */ 
    public function getRheId()
    {
        return $this->rheId;
    }

    /**
     * Set the value of rheId
     *
     * @return  self
     */ 
    public function setRheId($rheId)
    {
        $this->rheId = $rheId;

        return $this;
    }

    /**
     * Get the value of setor
     */ 
    public function getSetor()
    {
        return $this->setor;
    }

    /**
     * Set the value of setor
     *
     * @return  self
     */ 
    public function setSetor($setor)
    {
        $this->setor = $setor;

        return $this;
    }

    /**
     * Get the value of organizacao
     */ 
    public function getOrganizacao()
    {
        return $this->organizacao;
    }

    /**
     * Set the value of organizacao
     *
     * @return  self
     */ 
    public function setOrganizacao($organizacao)
    {
        $this->organizacao = $organizacao;

        return $this;
    }

    /**
     * Get the value of codSetor
     */ 
    public function getCodSetor()
    {
        return $this->codSetor;
    }

    /**
     * Set the value of codSetor
     *
     * @return  self
     */ 
    public function setCodSetor($codSetor)
    {
        $this->codSetor = $codSetor;

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
     * Get the value of dataUltimoLogin
     */ 
    public function getDataUltimoLogin()
    {
        return $this->dataUltimoLogin;
    }

    /**
     * Set the value of dataUltimoLogin
     *
     * @return  self
     */ 
    public function setDataUltimoLogin($dataUltimoLogin)
    {
        $this->dataUltimoLogin = $dataUltimoLogin;

        return $this;
    }
}
?>      
<?php

class Staff extends User{
    private ?string $numeroStaff;

    public function __construct(?string $numeroStaff=null)
    {
        parent :: __construct();
        $this->numeroStaff=$numeroStaff;
    }

    /**
     * Get the value of numeroStaff
     */ 
    public function getNumeroStaff()
    {
        return $this->numeroStaff;
    }

    /**
     * Set the value of numeroStaff
     *
     * @return  self
     */ 
    public function setNumeroStaff($numeroStaff)
    {
        $this->numeroStaff = $numeroStaff;

        return $this;
    }

    public function enterStaffFromKeyboard()
    {

        $this->nom = readline("Veuillez saisir le nom du bibliothécaire ");
        $this->prenom = readline("Veuillez saisir le prénom du bibliothécaire ");
        $this->email = readline("Veuillez saisir l'email du bibliothécaire ");
    }

    public function toArray(): array
    {
        $tab = [];
        $tab[] = $this->id;
        $tab[] = $this->nom;
        $tab[] = $this->prenom;
        $tab[] = $this->email;

        return $tab;
    }

    public static function StaffFromArray(array $tab): ?Staff
    {
        $staff = new static();
        return $staff;
    }
}
<?php

require 'User.php';

class Customer extends User
{
    private ?string $numeroCustomer;
    private ?arrayobject $books;
    private ?arrayobject $reserved;
    private ?int $nbreLivreReserve;
    private ?int $nbreLivreEmprunte;

    public function __construct(?string $numeroCustomer = null, ?arrayobject $books = null, ?arrayobject $reserved = null, ?int $nbreLivreReserve = null, ?int $nbreLivreEmprunte = null)
    {
        parent::__construct();
        $this->numeroCustomer = $numeroCustomer;
        $this->books = $books;
        // if ($this->books == null) {
        //     $this->books = new ArrayObject();
        // }
        $this->reserved = $reserved;
        // if ($this->reserved == null) {
        //     $this->reserved = new ArrayObject();
        // }
        $this->nbreLivreReserve = $nbreLivreReserve;
        $this->nbreLivreEmprunte = $nbreLivreEmprunte;
    }

    /**
     * Get the value of books
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Set the value of books
     *
     * @return  self
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Get the value of reserved
     */
    public function getReserved()
    {
        return $this->reserved;
    }

    /**
     * Set the value of reserved
     *
     * @return  self
     */
    public function setReserved($reserved)
    {
        $this->reserved = $reserved;

        return $this;
    }


    /**
     * Get the value of numeroUser
     */
    public function getNumeroCustomer()
    {
        return $this->numeroCustomer;
    }

    /**
     * Set the value of numeroUser
     *
     * @return  self
     */
    public function setNumeroCustomer($numeroCustomer)
    {
        $this->numeroCustomer = $numeroCustomer;

        return $this;
    }

    public function enterCustomerFromKeyboard()
    {

        $this->nom = readline("Veuillez saisir le nom de l'adhérent ");
        $this->prenom = readline("Veuillez saisir le prénom de l'adhérent ");
        $this->email = readline("Veuillez saisir l'email de l'adhérent ");
    }

    public function toArray(): array
    {
        $tab = [];
        $tab[] = User::getId();
        $tab[] = $this->numeroCustomer;
        $tab[] = User::getNom();
        $tab[] = User::getPrenom();
        $tab[] = User::getEmail();
        $tab[] = User::getPassword();
        $tab[] = User::getStatut();
        $tab[] = $this->nbreLivreReserve;
        $tab[] = $this->nbreLivreEmprunte;

        return $tab;
    }

    public static function CustomerFromArray(array $tab): ?Customer
    {
        $customer = new static();
        return $customer;
    }


    /**
     * Get the value of nbreLivreReserve
     */ 
    public function getNbreLivreReserve()
    {
        return $this->nbreLivreReserve;
    }

    /**
     * Set the value of nbreLivreReserve
     *
     * @return  self
     */ 
    public function setNbreLivreReserve($nbreLivreReserve)
    {
        $this->nbreLivreReserve = $nbreLivreReserve;
    }

    /**
     * Get the value of nbreLivreEmprunte
     */ 
    public function getNbreLivreEmprunte()
    {
        return $this->nbreLivreEmprunte;
    }

    /**
     * Set the value of nbreLivreEmprunte
     *
     * @return  self
     */ 
    public function setNbreLivreEmprunte($nbreLivreEmprunte)
    {
        $this->nbreLivreEmprunte = $nbreLivreEmprunte;
    }
}

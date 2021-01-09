<?php

require 'User.php';

class Customer extends User
{
    private ?string $numeroCustomer;
    private ?arrayobject $books;
    private ?arrayobject $reserved;

    public function __construct(?string $numeroCustomer = null, ?arrayobject $books = null, ?arrayobject $reserved = null)
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

        return $tab;
    }

    public static function CustomerFromArray(array $tab): ?Customer
    {
        $customer = new static();
        foreach ($tab as $key => $value) {
            if ($key !== "dateNaissance") {
                $customer->$key = $value;
            } else {
                $customer->setDateNaissance( DateHelper::toDateTimeWithFormat("Y-m-d",$value));
            }
        }
        return $customer;
    }

}

<?php
require_once "..\services\dao\CustomerDao.php";
require_once "..\services\dao\BookDao.php";
class Take
{

    private ?Customer $customer;
    private ?Book $book;
    private ?DateTime $start;
    private ?DateTime $end;
    private ?DateTime $return;

    public function __construct(
        ?Customer $customer = null,
        ?Book $book = null,
        ?DateTime $start = null,
        ?DateTime $end = null,
        ?DateTime $return = null
    ) {
        $this->customer = $customer;
        $this->book = $book;
        $this->start = $start;
        $this->end = $end;
        $this->return = $return;
    }

    /**
     * Get the value of customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get the value of book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set the value of book
     *
     * @return  self
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get the value of start
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of end
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set the value of end
     *
     * @return  self
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get the value of return
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * Set the value of return
     *
     * @return  self
     */
    public function setReturn($return)
    {
        $this->return = $return;

        return $this;
    }

    public function enterTakenByKeyboard(){
        $this->customer = readline ("Veuillez saisir l'identifiant de l'adhérent ");
        $this->book = readline ("Veuillez saisir le titre du livre ");
        $this->start = readline ("Date d'emprunt ");
        $this->end = null;
        $this->return = readline ("Date de retour prévue ?");

    }

    public function toArray(): array
    {
        $tab = [];
        $tab[] = $this->customer;
        $tab[] = $this->book;
        $tab[] = $this->copyNumber;
        $tab[] = $this->taken;
        $tab[] = $this->reserved;
        return $tab;
    }


}

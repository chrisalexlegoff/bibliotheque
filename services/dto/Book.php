<?php


class Book
{
    private ?int $id;
    private ?string $numeroLivre;    
    public ?string $title;
    private ?string $author;
    private ?int $copyNumber;
    private ?int $taken;
    private ?int $reserved;


    public function __construct(
        ?int $id = null,
        ?string $numeroLivre = null,
        ?string $title = null,
        ?string $author = null,
        ?int $copyNumber = null,
        ?int $taken = null,
        ?int $reserved = null

    ) {
        $this->id = $id;
        $this->numeroLivre = $numeroLivre;
        $this->title = $title;
        $this->author = $author;
        $this->copyNumber = $copyNumber;
        $this->taken = $taken;
        $this->reserved = $reserved;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of copyNumber
     */
    public function getCopyNumber()
    {
        return $this->copyNumber;
    }

    /**
     * Set the value of copyNumber
     *
     * @return  self
     */
    public function setCopyNumber($copyNumber)
    {
        $this->copyNumber = $copyNumber;

        return $this;
    }
    /**
     * Get the value of taken
     */
    public function getTaken()
    {
        return $this->taken;
    }

    /**
     * Set the value of taken
     *
     * @return  self
     */
    public function setTaken($taken)
    {
        $this->taken = $taken;

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
    }
    public function bookFromKeyboard()
    {
        $this->title = readline("Saisissez le titre du livre ");
        $this->author = readline("Saisissez l'auteur'du livre ");
        $this->copyNumber = readline("Saisissez le nombre de copies ");
        $this->isFree = true;
        $this->isReserved = false;
    }
    public function toArray(): array
    {
        $tab = [];
        $tab[] = $this->id;
        $tab[] = $this->numeroLivre;
        $tab[] = $this->title;
        $tab[] = $this->author;
        $tab[] = $this->copyNumber;
        $tab[] = $this->taken;
        $tab[] = $this->reserved;
        return $tab;
    }

    public static function BookFromArray(array $tab): ?Book
    {
        $staff = new static();
        return $staff;
    }

    /**
     * Get the value of numeroLivre
     */ 
    public function getNumeroLivre()
    {
        return $this->numeroLivre;
    }

    /**
     * Set the value of numeroLivre
     *
     * @return  self
     */ 
    public function setNumeroLivre($numeroLivre)
    {
        $this->numeroLivre = $numeroLivre;
    }

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
    }
}

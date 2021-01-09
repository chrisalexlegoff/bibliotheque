<?php

require_once "ConstantesDao.php";

class BookDao
{

    private const FILE_SAVE_BOOK = "../donnees/save_books.csv";
    private const FILE_CPT_BOOK = "../donnees/compteurs/cpt_books.txt";    
    private const CHAMP_ID = "id";
    private const CHAMP_NUMERO_BOOK = "numeroLivre";
    private const CHAMP_TITRE = "Titre";
    private const CHAMP_AUTEUR = "Auteur";
    private const CHAMP_EXEMPLAIRES = "Disponibles";
    private const CHAMP_EMPRUNTES = "Empruntés";
    private const CHAMP_RESERVES = "Réservés";
    private const ENTETES_BOOK = [BookDao::CHAMP_ID,BookDao::CHAMP_NUMERO_BOOK,BookDao::CHAMP_TITRE,BookDao::CHAMP_AUTEUR,BookDao::CHAMP_EXEMPLAIRES,BookDao::CHAMP_EMPRUNTES,BookDao::CHAMP_RESERVES];

    public function __construct()
    {
        ConstantesDao::initFiles(self::FILE_SAVE_BOOK, self::ENTETES_BOOK);
        ConstantesDao::initFiles(self::FILE_CPT_BOOK);
    }
   
    public function saveAll(array $books): void
    {
        $handle = fopen(BookDao::FILE_SAVE_BOOK, ConstantesDao::FILE_OPTION_W_PLUS);
        if (!empty(BookDao::ENTETES_BOOK)) {
            fputcsv($handle, BookDao::ENTETES_BOOK, ConstantesDao::DELIM);
        }
        foreach ($books as $book) {
            fputcsv($handle, $book->toArray(), ConstantesDao::DELIM);
        }
        fclose($handle);
    }

    public function getById($motif)
    {
        return $this->getOneByAttribute(BookDao::CHAMP_ID, $motif);
    }


    public function getAll(): array
    {
        $handle = fopen(BookDao::FILE_SAVE_BOOK, ConstantesDao::FILE_OPTION_R);
        $entities = [];

        $entetes = fgetcsv($handle, 0, ConstantesDao::DELIM);

        while (($entity = fgetcsv($handle, 0, ConstantesDao::DELIM)) != false) {
            $entities[] = Staff::StaffFromArray(array_combine($entetes, $entity));
        }

        fclose($handle);
        return $entities;
    }

    public function getByNom(string $motif): ?array
    {
        return $this->getAllByAttribute(BookDao::CHAMP_TITRE, $motif);
    }

    public function deleteById(int $idEntity): void
    {
        $allEntities = $this->getAll();
        for ($i = 0; $i < count($allEntities); $i++) {
            if ($allEntities[$i]->getId() === $idEntity) {
                array_splice($allEntities, $i, 1);
            }
        }
        $this->saveAll($allEntities);
    }
    public function modify(User $newEntity): void
    {
        $allEntities = $this->getAll();
        foreach ($allEntities as $currentEntity) {
           
            if ($currentEntity->getId() === $newEntity[BookDao::CHAMP_ID]) {
                $currentEntity = $newEntity;
            }
        }
        $this->saveAll($allEntities);
    }


    public function save(Book $newBook): Book
    {
        $handle = fopen(BookDao::FILE_SAVE_BOOK, ConstantesDao::FILE_OPTION_A_PLUS);
        fputcsv($handle, $newBook->toArray(), ConstantesDao::DELIM);
        fclose($handle);
        return $newBook;
    }



    public function getNextId(): int
    {
        $handle = fopen(BookDao::FILE_CPT_BOOK, ConstantesDao::FILE_OPTION_A_PLUS);
        $currentId = intval(fgets($handle));
        $currentId++;
        fclose($handle);
        $handle = fopen(BookDao::FILE_CPT_BOOK, ConstantesDao::FILE_OPTION_W_PLUS);
        fputs($handle, $currentId);
        fclose($handle);
        return $currentId;
    }

    public function getOneByAttribute(string $attribute, string $motif): ?Staff
    {
        $allEntities = $this->getAll();
        foreach ($allEntities as $entity) {
            $getter = "get".ucfirst($attribute);
            if (strtolower($entity->$getter()) === strtolower($motif)) {
                return $entity;
            }
        }
        return null;
    }
    public function getAllByAttribute(string $attribute, string $motif): array
    {
        $allEntities = $this->getAll();
        $entitiesCherchees = [];
        foreach ($allEntities as $entity) {
            $getter = "get".ucfirst($attribute);
            if (strtolower($entity->$getter()) === strtolower($motif)) {
                $entitiesCherchees[] = Staff::StaffFromArray($entity);
            }
        }
        return $entitiesCherchees;
    }
}

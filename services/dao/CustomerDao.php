<?php

require_once "ConstantesDao.php";

class CustomerDao
{

    private const FILE_SAVE_CUSTOMER = "../donnees/save_customers.csv";
    private const FILE_CPT_CUSTOMER = "../donnees/compteurs/cpt_customers.txt";    
    private const CHAMP_ID = "id";
    private const CHAMP_NUMERO_CUSTOMER = "numeroCustomer";
    private const CHAMP_NOM = "nom";
    private const CHAMP_PRENOM = "prenom";
    private const CHAMP_EMAIL = "email";
    private const ENTETES_CUSTOMER = [CustomerDao::CHAMP_ID,CustomerDao::CHAMP_NUMERO_CUSTOMER,CustomerDao::CHAMP_NOM,CustomerDao::CHAMP_PRENOM,CustomerDao::CHAMP_EMAIL];

    public function __construct()
    {
        ConstantesDao::initFiles(self::FILE_SAVE_CUSTOMER, self::ENTETES_CUSTOMER);
        ConstantesDao::initFiles(self::FILE_CPT_CUSTOMER);
    }
   
    public function saveAll(array $customers): void
    {
        $handle = fopen(CustomerDao::FILE_SAVE_CUSTOMER, ConstantesDao::FILE_OPTION_W_PLUS);
        if (!empty(CustomerDao::ENTETES_CUSTOMER)) {
            fputcsv($handle, CustomerDao::ENTETES_CUSTOMER, ConstantesDao::DELIM);
        }
        foreach ($customers as $customer) {
            fputcsv($handle, $customer->toArray(), ConstantesDao::DELIM);
        }
        fclose($handle);
    }

    public function getById($motif): array
    {
        return $this->getOneByAttribute(CustomerDao::CHAMP_ID, $motif);
    }


    public function getAll(): array
    {
        $handle = fopen(CustomerDao::FILE_SAVE_CUSTOMER, ConstantesDao::FILE_OPTION_R);
        $entities = [];

        $entetes = fgetcsv($handle, 0, ConstantesDao::DELIM);

        while (($entity = fgetcsv($handle, 0, ConstantesDao::DELIM)) != false) {
            $entities[] = array_combine($entetes, $entity);
        }

        fclose($handle);
        return $entities;
    }

    public function getByNom(string $motif): ?array
    {
        return $this->getAllByAttribute(CustomerDao::CHAMP_NOM, $motif);
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
           
            if ($currentEntity->getId() === $newEntity[CustomerDao::CHAMP_ID]) {
                $currentEntity = $newEntity;
            }
        }
        $this->saveAll($allEntities);
    }


    public function save(Customer $newCustomer): Customer
    {
        $handle = fopen(CustomerDao::FILE_SAVE_CUSTOMER, ConstantesDao::FILE_OPTION_A_PLUS);
        $newCustomer->setId($this->getNextId());
        $newCustomer->setNumeroCustomer("SM".str_pad($newCustomer->getId(), 6, "0", STR_PAD_LEFT));
        fputcsv($handle, $newCustomer->toArray(), ConstantesDao::DELIM);
        fclose($handle);
        return $newCustomer;
    }



    public function getNextId(): int
    {
        $handle = fopen(CustomerDao::FILE_CPT_CUSTOMER, ConstantesDao::FILE_OPTION_A_PLUS);
        $currentId = intval(fgets($handle));
        $currentId++;
        fclose($handle);
        $handle = fopen(CustomerDao::FILE_CPT_CUSTOMER, ConstantesDao::FILE_OPTION_W_PLUS);
        fputs($handle, $currentId);
        fclose($handle);
        return $currentId;
    }

    public function getOneByAttribute(string $attribute, string $motif): array
    {
        $allEntities = $this->getAll();
        foreach ($allEntities as $entity) {
            // $getter = "get".ucfirst($attribute);
            if (strtolower($entity[$attribute]) === strtolower($motif)) {
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
                $entitiesCherchees[] = Customer::CustomerFromArray($entity);
            }
        }
        return $entitiesCherchees;
    }
}

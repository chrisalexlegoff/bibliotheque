<?php

require_once "ConstantesDao.php";

class StaffDao
{

    private const FILE_SAVE_STAFF = "../donnees/save_staffs.csv";
    private const FILE_CPT_STAFF = "../donnees/compteurs/cpt_customers.txt";    
    private const CHAMP_ID = "id";
    private const CHAMP_NUMERO_STAFF = "numeroStaff";
    private const CHAMP_NOM = "nom";
    private const CHAMP_PRENOM = "prenom";
    private const CHAMP_EMAIL = "email";
    private const ENTETES_STAFF = [StaffDao::CHAMP_ID,StaffDao::CHAMP_NUMERO_STAFF,StaffDao::CHAMP_NOM,StaffDao::CHAMP_PRENOM,StaffDao::CHAMP_EMAIL];

    public function __construct()
    {
        ConstantesDao::initFiles(self::FILE_SAVE_STAFF, self::ENTETES_STAFF);
        ConstantesDao::initFiles(self::FILE_CPT_STAFF);
    }
   
    public function saveAllStaff(array $staffs): void
    {
        $handle = fopen(StaffDao::FILE_SAVE_STAFF, ConstantesDao::FILE_OPTION_W_PLUS);
        if (!empty(StaffDao::ENTETES_STAFF)) {
            fputcsv($handle, StaffDao::ENTETES_STAFF, ConstantesDao::DELIM);
        }
        foreach ($staffs as $staff) {
            fputcsv($handle, $staff->toArray(), ConstantesDao::DELIM);
        }
        fclose($handle);
    }

    public function getByStaffId($motif)
    {
        return $this->getOneStaffByAttribute(StaffDao::CHAMP_ID, $motif);
    }


    public function getAllStaff(): array
    {
        $handle = fopen(StaffDao::FILE_SAVE_STAFF, ConstantesDao::FILE_OPTION_R);
        $entities = [];

        $entetes = fgetcsv($handle, 0, ConstantesDao::DELIM);

        while (($entity = fgetcsv($handle, 0, ConstantesDao::DELIM)) != false) {
            $entities[] = Staff::StaffFromArray(array_combine($entetes, $entity));
        }

        fclose($handle);
        return $entities;
    }

    public function getStaffByNom(string $motif): ?array
    {
        return $this->getAllStaffByAttribute(StaffDao::CHAMP_NOM, $motif);
    }

    public function deleteStaffById(int $idEntity): void
    {
        $allEntities = $this->getAllStaff();
        for ($i = 0; $i < count($allEntities); $i++) {
            if ($allEntities[$i]->getId() === $idEntity) {
                array_splice($allEntities, $i, 1);
            }
        }
        $this->saveAllStaff($allEntities);
    }
    public function modify(User $newEntity): void
    {
        $allEntities = $this->getAllStaff();
        foreach ($allEntities as $currentEntity) {
           
            if ($currentEntity->getId() === $newEntity[StaffDao::CHAMP_ID]) {
                $currentEntity = $newEntity;
            }
        }
        $this->saveAllStaff($allEntities);
    }


    public function saveStaff(Staff $newStaff): Staff
    {
        $handle = fopen(StaffDao::FILE_SAVE_STAFF, ConstantesDao::FILE_OPTION_A_PLUS);
        $newStaff->setId($this->getNextStaffId());
        $newStaff->setNumeroStaff("SM".str_pad($newStaff->getId(), 6, "0", STR_PAD_LEFT));
        fputcsv($handle, $newStaff->toArray(), ConstantesDao::DELIM);
        fclose($handle);
        return $newStaff;
    }



    public function getNextStaffId(): int
    {
        $handle = fopen(StaffDao::FILE_CPT_STAFF, ConstantesDao::FILE_OPTION_A_PLUS);
        $currentId = intval(fgets($handle));
        $currentId++;
        fclose($handle);
        $handle = fopen(StaffDao::FILE_CPT_STAFF, ConstantesDao::FILE_OPTION_W_PLUS);
        fputs($handle, $currentId);
        fclose($handle);
        return $currentId;
    }

    public function getOneStaffByAttribute(string $attribute, string $motif): ?Staff
    {
        $allEntities = $this->getAllStaff();
        foreach ($allEntities as $entity) {
            $getter = "get".ucfirst($attribute);
            if (strtolower($entity->$getter()) === strtolower($motif)) {
                return $entity;
            }
        }
        return null;
    }
    public function getAllStaffByAttribute(string $attribute, string $motif): array
    {
        $allEntities = $this->getAllStaff();
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

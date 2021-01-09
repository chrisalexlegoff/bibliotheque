<?php

require_once "ConstantesDao.php";

class TakeDao
{
    private const FILE_SAVE_TAKE = "../donnees/save_take.csv";
    private const CHAMP_TITLE = "Titre du livre";
    private const CHAMP_CUSTOMER = "Nom de l'emprunteur";
    private const CHAMP_START = "Date de l'emprunt";
    private const CHAMP_RETURN = "Retourné le ";
    private const CHAMP_END = "Date de retour prévue";
    private const ENTETES_TAKE = [TakeDao::CHAMP_TITLE, TakeDao::CHAMP_CUSTOMER, TakeDao::CHAMP_START, TakeDao::CHAMP_RETURN, TakeDao::CHAMP_END];

    public function __construct()
    {
        ConstantesDao::initFiles(self::FILE_SAVE_TAKE, self::ENTETES_TAKE);
    }

    public function saveAll(array $takes): void
    {
        $handle = fopen(TakeDao::FILE_SAVE_TAKE, ConstantesDao::FILE_OPTION_W_PLUS);
        if (!empty(TakeDao::ENTETES_TAKE)) {
            fputcsv($handle, TakeDao::ENTETES_TAKE, ConstantesDao::DELIM);
        }
        foreach ($takes as $take) {
            fputcsv($handle, $take->toArray(), ConstantesDao::DELIM);
        }
        fclose($handle);
    }
}

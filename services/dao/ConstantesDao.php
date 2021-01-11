<?php
class ConstantesDao
{
    public const DELIM = ";";
    public const FILE_OPTION_W_PLUS = "w+";
    public const FILE_OPTION_A_PLUS = "a+";
    public const FILE_OPTION_R = "r";


    public static function initFiles(string $chemin, ?array $entete = null): void
    {
        if (!file_exists($chemin)) {
            $pathParent = dirname($chemin);
            if (!file_exists($pathParent)) {
                mkdir($pathParent, 0777, true);
            }
            touch($chemin);
            $handle = fopen($chemin, ConstantesDao::FILE_OPTION_W_PLUS);
            if ($entete != null && !empty($entete)) {
                fputcsv($handle, $entete, ConstantesDao::DELIM);
            }
        }
    }
   
}


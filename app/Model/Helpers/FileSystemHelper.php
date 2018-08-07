<?php
/**
 * @author: wellbloud
 * created: 5.8.18
 */
declare(strict_types=1);


namespace App\Model\Helpers;


abstract class FileSystemHelper
{

    /**
     * Prohleda zadanou slozku a vrati seznam souboru
     * @param string $folder
     * @return  array
     */
    public static function getFiles(string $folder = ''): array
    {
        if ($folder === '') {
            return [];
        }
        $files = scandir($folder);
        return array_diff($files, array('.', '..'));
    }
}
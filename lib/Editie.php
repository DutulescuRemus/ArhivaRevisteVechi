<?php

namespace ArhivaRevisteVechi\lib;
use ArhivaRevisteVechi\resources\db\DBC;

require_once("../resources/config.php");
require_once HELPERS . "/h_images.php";

class Editie
{
    public $numeRevista, $revistaId;
    public $an, $luna, $numar, $editieId;

    public $editieDirPath;
    public $editieBaseName;

    public $listaArticole;

    public function __construct($dbRow)
    {
        $this->numeRevista    = $dbRow[DBC::REV_NUME];
        $this->revistaId      = $dbRow[DBC::REV_ID];

        $this->an             = $dbRow[DBC::ED_AN];
        $this->luna           = $dbRow[DBC::ED_LUNA];
        $this->numar          = $dbRow[DBC::ED_NUMAR];
        $this->editieId       = $dbRow[DBC::ED_ID];

        $this->editieDirPath  = $this->buildEditieBaseDir();
        $this->editieBaseName = $this->buildEditieBaseName();

        // fiecare articol se adauga singur in acest array
        $listaArticole = array();
    }

    /**
     * Construieste calea catre directorul imaginilor unei reviste
     * (ex img/level/1999/12)
     */
    private function buildEditieBaseDir() {
        return  IMG . DIRECTORY_SEPARATOR
        .strtolower($this->numeRevista) . DIRECTORY_SEPARATOR
        .$this->an . DIRECTORY_SEPARATOR
        .padLeft($this->luna, LUNA_PAD);
    }

    /**
     * Construieste radacina comuna a numelor imaginilor din director,
     * compusa din Numele Revistei, Anul si Luna aparitiei,
     * care va fi folosita ulterior pentru a construi
     * numele fiecarei imagini. Exemplu:
     * * editie base name = 'Level 1999 12' (fara spatii)
     * * pagina 1 base name = Level199912001
     * * pagina 1 imagine full = Level199912001.jpg
     * * pagina 1 imagine thumb = /th/Level199912001_th.jpg
     */
    private function buildEditieBaseName()
    {
        return  $this->numeRevista
                .$this->an
                .padLeft($this->luna, LUNA_PAD);
    }
}
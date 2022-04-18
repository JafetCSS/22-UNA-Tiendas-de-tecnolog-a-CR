<?php

class Category
{

    private $idCategory;
    private $nameCategory;
    private $statusCategory;

    public function __construct($idCategory, $nameCategory, $statusCategory)
    {
        $this->idCategory = $idCategory;
        $this->nameCategory = $nameCategory;
        $this->statusCategory = $statusCategory;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getNameCategory()
    {
        return $this->nameCategory;
    }

    public function getStatusCategory()
    {
        return $this->statusCategory;
    }
}

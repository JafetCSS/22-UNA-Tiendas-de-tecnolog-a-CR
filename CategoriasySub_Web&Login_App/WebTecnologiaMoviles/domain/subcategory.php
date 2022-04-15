<?php

class SubCategory
{

    private $idSubCategory;
    private $nameSubCategory;
    private $idParentCategory;
    private $statusSubCategory;

    public function __construct($idSubCategory, $nameSubCategory, $idParentCategory, $statusSubCategory)
    {
        $this->idSubCategory = $idSubCategory;
        $this->nameSubCategory = $nameSubCategory;
        $this->idParentCategory = $idParentCategory;
        $this->statusSubCategory = $statusSubCategory;
    }

    public function getIdSubCategory()
    {
        return $this->idSubCategory;
    }

    public function getNameSubCategory()
    {
        return $this->nameSubCategory;
    }

    public function getIdParentCategory()
    {
        return $this->idParentCategory;
    }

    public function getStatusSubCategory()
    {
        return $this->statusSubCategory;
    }
}

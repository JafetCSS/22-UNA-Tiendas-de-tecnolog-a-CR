<?php
include_once "../data/subcategorydata.php";
class SubCategoryBusiness
{

    private $data;
    public function __construct()
    {
        $this->data = new SubCategoryData();
    }

    public function saveSubCategory($subcategory)
    {
        return $this->data->saveSubCategory($subcategory);
    }

    public function getAllSubCategory()
    {
        return $this->data->getAllSubCategory();
    }

    public function updateSubCategory($subcategory)
    {
        return $this->data->updateSubCategory($subcategory);
    }

    public function deleteSubCategory($idSubcategory)
    {
        return $this->data->deleteSubCategory($idSubcategory);
    }
}

<?php
include_once "../data/categorydata.php";

class CategoryBusiness
{

    private $data;
    public function __construct()
    {
        $this->data = new CategoryData();
    }

    public function saveCategory($category)
    {
        return $this->data->saveCategory($category);
    }

    public function getAllCategory()
    {
        return $this->data->getAllCategory();
    }

    public function updateCategory($category)
    {
        return $this->data->updateCategory($category);
    }

    public function deleteCategory($idCategory)
    {
        return $this->data->deleteCategory($idCategory);
    }
}

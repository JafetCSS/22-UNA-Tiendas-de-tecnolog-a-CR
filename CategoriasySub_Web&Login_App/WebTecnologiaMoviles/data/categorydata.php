<?php
include_once "data.php";
include_once "../domain/category.php";
class CategoryData
{

    public static function getNextID()
    {
        $connection = Data::createInstance();
        $sql = $connection->query("SELECT COUNT(*) AS numberid FROM tbcategory");
        $numberid = $sql->fetch();
        return $numberid['numberid'];
    }

    public static function saveCategory($category)
    {
        $connection = Data::createInstance();
        $sql = $connection->prepare("INSERT INTO tbcategory(tbcategoryid,tbcategoryname,tbcategorystatus) VALUES(?,?,?)");
        $sql->execute(array(
            CategoryData::getNextID() + 1, $category->getNameCategory(), $category->getStatusCategory()
        ));
    }

    public static function getAllCategory()
    {
        $connection = Data::createInstance();
        $sql = $connection->query("SELECT * FROM tbcategory");
        $categories = [];
        foreach ($sql->fetchAll() as $category) {
            $categories[] = new Category(
                $category['tbcategoryid'],
                $category['tbcategoryname'],
                $category['tbcategorystatus'],
            );
        }
        return $categories;
    }

    public static function updateCategory($category)
    {
        $connection = Data::createInstance();
        $sql = $connection->query("UPDATE tbcategory SET tbcategoryname='" . $category->getNameCategory() . "', tbcategorystatus='" . $category->getStatusCategory() .
            "' WHERE tbcategoryid=" . $category->getIdCategory());
        return 1;
    }

    public static function deleteCategory($idCategory)
    {
        $connection = Data::createInstance();
        $sql = $connection->query("DELETE FROM tbcategory WHERE tbcategoryid=" . $idCategory);
        return 1;
    }
}

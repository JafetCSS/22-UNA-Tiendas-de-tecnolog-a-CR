<?php
include_once "data.php";
include_once "../domain/subcategory.php";

class SubCategoryData
{

    public static function getNextID()
    {
        $connection = Data::createInstance();
        $sql = $connection->query("SELECT COUNT(*) AS numberid FROM tbsubcategory");
        $numberid = $sql->fetch();
        return $numberid['numberid'];
    }

    public static function saveSubCategory($subcategory)
    {
        $connection = Data::createInstance();
        $sql = $connection->prepare("INSERT INTO tbsubcategory(tbsubcategoryid,tbsubcategoryname,tbsubcategoryparentid,tbsubcategorystatus) VALUES(?,?,?,?)");
        $sql->execute(array(
            SubCategoryData::getNextID() + 1, $subcategory->getNameSubCategory(), $subcategory->getIdParentCategory(), $subcategory->getStatusSubCategory()
        ));
    }

    public static function getAllSubCategory()
    {
        $connection = Data::createInstance();
        $sql = $connection->query("SELECT * FROM tbsubcategory");
        $subcategories = [];
        foreach ($sql->fetchAll() as $subcategory) {
            $subcategories[] = new SubCategory(
                $subcategory['tbsubcategoryid'],
                $subcategory['tbsubcategoryname'],
                $subcategory['tbsubcategoryparentid'],
                $subcategory['tbsubcategorystatus'],
            );
        }
        return $subcategories;
    }

    public static function updateSubCategory($subcategory)
    {
        $connection = Data::createInstance();
        $sql = $connection->query("UPDATE tbsubcategory SET tbsubcategoryname='" . $subcategory->getNameSubCategory() . "', tbsubcategorystatus='" . $subcategory->getStatusSubCategory() .
            "' WHERE tbsubcategoryid=" . $subcategory->getIdSubCategory());
        return 1;
    }


    public static function deleteSubCategory($idSubcategory)
    {
        $connection = Data::createInstance();
        $sql = $connection->query("DELETE FROM tbsubcategory WHERE tbsubcategoryid=" . $idSubcategory);
        return 1;
    }
}

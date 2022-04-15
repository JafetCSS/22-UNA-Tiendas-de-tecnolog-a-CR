<?php

include_once "./subcategorybusiness.php";
include_once "../domain/subcategory.php";

$subcategorybusiness = new SubCategoryBusiness();

if (isset($_POST['create'])) {
   if (isset($_POST['subcategory_name']) && isset($_POST['category']) && isset($_POST['subcategory'])) {
      if (strlen($_POST['subcategory_name']) > 0 && strlen($_POST['category']) > 0 && strlen($_POST['subcategory']) > 0) {
         $results = $subcategorybusiness->saveSubCategory(new SubCategory(0, $_POST['subcategory_name'], $_POST['category'], $_POST['subcategory']));
         if ($results == 0) {
            header("Location: ../view/addsubcategoryview.php");
         } else {
            header("Location: ../view/addsubcategoryview.php?message=dberror");
         }
      } else {
         header("Location: ../view/addsubcategoryview.php?message=empty");
      }
   } else {
      header("Location: ../view/addsubcategoryview.php?message=error");
   }
} else if (isset($_POST['update'])) {

   if ( //Validacion de campos vacios
      strlen($_POST['id_subcategory']) > 0 && strlen($_POST['category_name']) > 0 && strlen($_POST['id_categoryparent']) > 0
      && strlen($_POST['subcategory']) > 0
   ) {
      $result = $subcategorybusiness->updateSubCategory(new SubCategory(
         $_POST['id_subcategory'],
         $_POST['category_name'],
         $_POST['id_categoryparent'],
         $_POST['subcategory']
      ));
      if ($result == 1) {
         header("Location: ../view/addsubcategoryview.php?message=updated");
      } else {
         header("Location: ../view/addsubcategoryview.php?message=dberror");
      }
   } else {
      header("Location: ../view/addsubcategoryview.php?message=empty");
   }
} else if (isset($_POST['delete'])) {

   $result = $subcategorybusiness->deleteSubCategory($_POST['id_subcategory']);
   if ($result == 1) {
      header("Location: ../view/addsubcategoryview.php?message=deleted");
   } else {
      header("Location: ../view/addsubcategoryview.php?message=dberror");
   }
}

<?php

include_once "./categorybusiness.php";
include_once "../domain/category.php";

$categorybusiness = new CategoryBusiness();

if (isset($_POST['create'])) {
    if (isset($_POST['category_name']) && isset($_POST['category'])) {

        if (strlen($_POST['category_name']) > 0 && strlen($_POST['category']) > 0) {
            $results = $categorybusiness->saveCategory(new Category(0, $_POST['category_name'], $_POST['category']));
            if ($results == 0) {
                header("Location: ../view/addcategoryview.php?message=inserted");
            } else {
                header("Location: ../view/addcategoryview.php?message=dberror");
            }
        } else {
            header("Location: ../view/addcategoryview.php?message=empty");
        }
    } else {
        header("Location: ../view/addcategoryview.php?message=error");
    }
} else if (isset($_POST['update'])) {
    if (isset($_POST['id_category']) && isset($_POST['category_name']) && isset($_POST['category'])) {
        if (strlen($_POST['id_category']) > 0 && strlen($_POST['category_name']) > 0 && strlen($_POST['category']) > 0) {
            $results = $categorybusiness->updateCategory(new Category($_POST['id_category'], $_POST['category_name'], $_POST['category']));
            if ($results == 1) {
                header("Location: ../view/addcategoryview.php?message=updated");
            } else {
                header("Location: ../view/addcategoryview.php?message=dberror");
            }
        } else {
            header("Location: ../view/addcategoryview.php?message=empty");
        }
    } else {
        header("Location: ../view/addcategoryview.php?message=error");
    }
} else if (isset($_POST['delete'])) {
    if (isset($_POST['id_category'])) {
        if (strlen($_POST['id_category']) > 0) {
            $results = $categorybusiness->deleteCategory($_POST['id_category']);
            if ($results == 1) {
                header("Location: ../view/addcategoryview.php?message=deleted");
            } else {
                header("Location: ../view/addcategoryview.php?message=dberror");
            }
        } else {
            header("Location: ../view/addcategoryview.php?message=empty");
        }
    } else {
        header("Location: ../view/addcategoryview.php?message=error");
    }
}

<?php

class FormController extends AbstractController
{
    public function showForm()
     {
         $categoryModel = new CategoryModel();

        $this->render('./views/formulaire.phtml', [
         'categories' => $categoryModel->getCategories()
        ]);
     }


     public function addCategory()
     {
        $categoryModel = new CategoryModel();


        $categoryModel->createCategory($_POST['categoryName']);
      

        header('Location: index.php?route=home');
        exit();
     }
     
     public function addRoom()
     {
        $categoryModel = new RoomModel();

        $categoryModel->createRoom($_POST['roomName'], $_POST['categoryId']);

        header('Location: index.php?route=home');
        exit();
     }
}
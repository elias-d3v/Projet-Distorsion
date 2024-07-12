<?php

class MainController extends AbstractController
{
    public function showHome()
    {
        if (!isset($_GET['roomid']))
        {
            $categoryModel = new CategoryModel();
            $roomsModel = new RoomModel();

            $this->render('./views/home.phtml', [
                'categories' => $categoryModel->getCategories(),
                'rooms' =>  $roomsModel->getRooms(),
            ]);
            
        } else 
        {            
            $categoryModel = new CategoryModel();
            $roomsModel = new RoomModel();
            $messageModel = new MessageModel();

            $this->render('./views/home.phtml', [
                'categories' => $categoryModel->getCategories(),
                'rooms' =>  $roomsModel->getRooms(),
                'messages' => $messageModel->getMessagesByRoom()
            ]);
        }

    }

    

    public function sendMessage()
    {
        $messageModel = new MessageModel();

        $messageModel->sendMessage($_POST['content'], $_GET['roomid']);

        header('Location: index.php?route=home&roomid=' . $_GET['roomid']);
        exit();
    }

}


?>
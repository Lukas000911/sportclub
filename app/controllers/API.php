<?php

class API extends Controller
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = $this->model('post');
    }

    public function addComment()
    {
        //paduoti sql duomenis

        $data = [
            'user_id' => $_POST['user_id'],
            'userName' => $_POST['userName'],
            'comment' => trim($_POST['comment']),
            'commentErr' => '',
        ];

        if (empty($_POST['comment'])) {
            $data['commentErr'] = 'Šis laukelis neužpildytas';
        } elseif (strlen($_POST['comment']) > 500) {
            $data['commentErr'] = 'Komentaras negali viršyti 500 simbolių';
        }


        if (empty($data['commentErr'])) {
            $this->commentModel->addComment($data);
        }

        header('Content-Type: application/json');
        echo json_encode($_POST);
        die();
    }

    public function getComments()
    {
        $data = $this->commentModel->getPosts();
        header('Content-Type: application/json');
        echo json_encode($data);
        die();
    }
}

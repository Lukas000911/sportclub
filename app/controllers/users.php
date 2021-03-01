<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'phoneNum' => trim($_POST['phoneNum']),
                'homeAddress' => trim($_POST['homeAddress']),
                'firstName_err' => '',
                'lastName_err' => '',
                'email_err' => '',
                'password_err' => '',


            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Įveskite elektroninį paštą';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Elektroninis paštas neatitinka teisingo formato';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Toks elektroninio pašto adresas jau užregistruotas';
                }
            }

            if (empty($data['firstName'])) {
                $data['firstName_err'] = 'Įveskite vardą';
            } elseif (strlen($data['firstName']) > 40) {
                $data['firstName_err'] = 'Vardas negali būti ilgesnis, nei 40 simbolių';
            }


            if (empty($data['lastName'])) {
                $data['lastName_err'] = 'Įveskite pavardę';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Įveskite slaptažodį';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Slaptažodį privalo sudaryti bent 6 simboliai';
            }


            if (empty($data['email_err']) && empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)) {
                    header('Location:' . URLROOT . '/users/login');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'firstName' => '',
                'lastName' => '',
                'email' => '',
                'password' => '',
                'phoneNum' => '',
                'firstName_err' => '',
                'lastName_err' => '',
                'email_err' => '',
                'password_err' => '',
                'homeAddress' => '',
            ];

            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Įveskite elektroninio pašto adresą';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Elektroninis paštas neatitinka formato';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Prašome įvesti slaptažodį';
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
            } else {
                $data['email_err'] = 'Tokio elektroninio pašto adreso nėra';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->logIn($data['email'], $data['password']);
                if ($loggedInUser) {
                    $this->createSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Slaptažodis neteisingas';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }

    public function createSession($loggedInUser)
    {

        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_email'] = $loggedInUser->email;
        $_SESSION['user_name'] = $loggedInUser->firstName;
        header('Location:' . URLROOT . '/pages/index');
    }
}

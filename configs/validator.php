<?php

require_once ('db.php');

class Validator
{

    protected $db;
    private $data;
    private $errors = [];
    private static $fields = ['name', 'email','phone', 'info'];

  


    public function __construct($post_data)
    {
        $this->db = DB();
        $this->data = $post_data;
    }

    function __destruct()
    {
        $this->db = null;
    }

    public function validateForm()
    {

        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("'$field' is not present in the data");
                return;
            }
        }

        $this->validateName();
        $this->validateEmail();
        $this->validatePhone();
        $this->validateInfo();

        return $this->errors;

    }

    private function validateName()
    {

        $val = trim($this->data['name']);

        if (empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z ]{3,100}$/', $val)) {
                $this->addError('name', 'name must be 3-100 chars & alphanumeric');
            }
        }
    }

    private function validateEmail()
    {

        $val = trim($this->data['email']);

        if (empty($val)) {
            $this->addError('email', 'email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'email must be a valid email address');
            }
        }
    }

    private function validatePhone()
    {

        $val = trim($this->data['phone']);

        if (empty($val)) {
            $this->addError('phone', 'phone cannot be empty');
        } else {
            if (!preg_match('/^[0-9\-\(\)\/\+\s]{7,25}$/', $val)) {
                $this->addError('phone', 'phone must be a valid phone number');
            }
        }
    }

    private function validateInfo()
    {

        $val = trim($this->data['info']);

        if (empty($val)) {
           // $this->addError('info', 'info cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z0-9 ]{1,255}$/', $val)) {
                $this->addError('info', 'info must be 1-255 chars & alphanumeric');
            }
        }
    }
    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

}

<?php
class UserSkeleton
{
    private $user_id;
    private $email;
    private $first_name;
    private $last_name;
    private $password;


    public function __construct($user_id, $email, $first_name, $last_name, $password)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
    }



    public function getUser_id() {
        return $this->user_id;
    }


    public function getEmail() {
        return $this->email;
    }


    public function getFirst_name() {
        return $this->first_name;
    }


    public function getLast_name() {
        return $this->last_name;
    }



    public function getPassword() {
        return $this->password;
    }



    public function toArray() {
        return [
            'user_id' => $this->user_id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => $this->password,
        ];
    }
}

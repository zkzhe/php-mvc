<?php
class User
{
    private $db;
    public $google_client;
    public function __construct()
    {
        $this->db = new Database;
        $this->google_client = new  Google_Client;
        $this->google_client->setClientId('335862326751-rkjpdtkng4f4rboeipi71nq1sdscd8se.apps.googleusercontent.com');

        //Set the OAuth 2.0 Client Secret key
        $this->google_client->setClientSecret('p_a0JHTv-nqu-t5LCmN2kK5_');

        //Set the OAuth 2.0 Redirect URI
        $this->google_client->setRedirectUri('http://develop-php-mvc.zkzhe.test/users/profile');

        //
        $this->google_client->addScope('email');

        $this->google_client->addScope('profile');
        $GLOBALS['googlelogin'] = '<a href="' . $this->google_client->createAuthUrl() . '"><img src="https://www.tutsmake.com/wp-content/uploads/2019/12/google-login-image.png" width="210px" height="55px"/></a>';
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if ($this->db->rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }
}

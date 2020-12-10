<?php


namespace Core;

use App\app;


class Session
{
    private  ?array $user = null;

    public function __construct()
    {
        session_start();
        $this->loginFromCookie();
    }

    /**
     * Login user from $_SESSION
     *
     * @return bool
     */
    public function loginFromCookie(): bool
    {
        if ($_SESSION) {
            return $this->login($_SESSION['email'], $_SESSION['password']);
        }

        return false;
    }


    /**
     * Login user
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        $user = App::$db->getRowWhere('users', [
            'email' => $email,
            'password' => $password
        ]);

        if ($user) {
            $_SESSION = [
                'email' => $email,
                'password' => $password,
                'role' => $user['role']
            ];

            $this->user = $user;

            return true;
        }

        $this->user = null;

        return false;
    }

    /**
     * Getter for private array $user
     *
     * @return array|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Logout user and redirect to another location
     *
     * @param string $redirect
     */
    public function logout($redirect = null)
    {
        $_SESSION = [];
        session_destroy();

        if ($redirect) {
            header("Location: $redirect");
        }
    }
}
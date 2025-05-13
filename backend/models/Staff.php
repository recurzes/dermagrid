<?php
require_once __DIR__ . '/../config/database.php';

class Staff {
    // Authenticate staff member
    public static function authenticate($username, $password)
    {
        $result = executeStoredProcedure('AuthenticateUser', [$username]);

        if (!empty($result)) {
            $staff = $result[0];

            // Verify password
            if (password_verify($password, $staff['password_hash'])) {
                // Remove password_hash from session data
                unset($staff['password_hash']);
                return $staff;
            }
        }

        return false;
    }

    // Add new staff member
    public static function add($firstname, $last_name, $role, $email, $phone, $username, $password)
    {

    }
}

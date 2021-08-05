<?php
namespace BinhLD\Laravel2FA;

use BinhLD\Laravel2FA\Exceptions\TOTPException;

class TOTPAuth {
    public $model;

    public function __construct(Authenticable $model) {
        $this->model = $model;
    }

    public function check(array $credentials)
    {
        if (isset($credentials['email']) && isset($credentials['password'])) {
            // check email and password
            $password = $this->model->getCredential('password', $credentials['email']);

            if (!empty($password)) {
                if (crypt($credentials['password'], $password) == $password) {
                    return true;
                }
                return false;
            }
            throw new TOTPException('That user has not a password');
        }
        throw new TOTPException('Missing email or password credentials');
    }

    public function checkTOTP($totp_code)
    {
        if (isset($totp_code)) {

        }
        throw new TOTPException('Missing TOTP Code');
    }

    public function checkBackupCode($backup_code)
    {
        if (isset($backup_code)) {
        
        }
        throw new TOTPException('Missing Backup Code');
    }

}
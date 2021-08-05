<?php
namespace BinhLD\Laravel2FA;

interface Authenticable {
    /**
     * @return string
     */
    public function getCredential($columnName, $email);
}
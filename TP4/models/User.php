<?php

class User
{
    private string $m_login;
    private string $m_password;
    private const string $USER_TABLE = "User";
    
    public function __construct(string $login, string $password = null)
    {
        $this->m_login = $login;
        $this->m_password = $password;
    }
    
    public function getLogin() : string
    { return $this->m_login; }
    
    public function setLogin(string $log) : void
    { $this->m_login = $log; }
    
    public function getPassword() : string
    { return $this->m_password; }
    
    public function setPassword(string $pass) : void
    { $this->m_password = $pass; }
    
    public function exists() : bool
    {
        
    }
}

<?php

require_once('MyPDO.php');
const USER_TABLE = "Users";

class User
{
    private string $m_login;
    private string $m_password;
    
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
        $pdo = MyPdo::pdo();

        $request = $pdo->prepare("SELECT password FROM ".USER_TABLE." WHERE login = :log");
        $request->bindValue(':log', $this->m_login, PDO::PARAM_STR);

        $ok = $request->execute();
        
        $row = $request->fetch();
        if(!$row)
        {
            return false;
        }
        
        if(!password_verify($password, $row['Password']))
        {
            return false;
        }
        
        return true;
    }
    
    public function create()
    {
        $pdo = MyPdo::pdo();
        
        $verif = $pdo->prepare("SELECT login FROM ".USER_TABLE." WHERE login = :log");
        $verif->bindValue(':log', $this->m_login, PDO::PARAM_STR);
        $verif->execute();
        if($verif->fetch()) {
            throw new Exception("Utilisateur déjà présent");
        }
        
        $request = $pdo->prepare("INSERT INTO Users (login, password) VALUES (:log , :pass )");
        $request->bindValue(':log', $this->m_login, PDO::PARAM_STR);
        $request->bindValue(':pass', $this->m_password, PDO::PARAM_STR);
        
        $ok = $request->execute();

        if(!$ok)
        {
            throw new Exception("Erreur inconnue");
        }
    }
}

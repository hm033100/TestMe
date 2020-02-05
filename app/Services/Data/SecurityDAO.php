<?php
namespace App\Services\Data;

use App\Services\Utility\DatabaseException;
use App\model\User;
use Illuminate\Support\Facades\Log;
use PDOException;

class SecurityDAO{
    private $db = NULL;
    
    public function __construct($db){
        $this->db = $db;
    }
    
    public function findByUser(User $user){
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            
            $name = $user->getUserName();
            $pw = $user->getPassword();
            
            $stmt = $this->db->prepare('SELECT ID, USERNAME, PASSWORD FROM users WHERE USERNAME = :username AND PASSWORD = :password');
            
            
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $stmt->execute();
            
            if ($stmt->rowCount() == 1){
                Log::info("Exit SecurityDAO().findByUser() with true");
                return true;
            } else {
                Log::info("Exit SecurityDAO().findByUser() with false");
                return false;
            }
            
        } catch (PDOException $e) {
            Log::error("Exception: ", array("message"  => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
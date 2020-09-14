<?
namespace App\Models;
use App\Components\Database;
use PDO;

Class User
{
   
    private $tablename = 'users';
    private $db;
    public function __construct()
    {
        $this->db= Database::connect_to_database();
        
    }
    public function autorize(){
        if (isset($_POST)) {
            $query =  $this->db->query('SELECT * FROM '.$this->tablename.' WHERE login ="'.$_POST['Login'].'"
               AND password = "'.$_POST['Password'].'" ');
            $result = $query->fetch();
       if ( !empty($result))
       { 
    
        $_SESSION['admin'] = 'admin';
        return TRUE;
    }
    else {
        header('location: /');
    }      
        }
        else {
            return FALSE;
        }
        }
    
      

       

}
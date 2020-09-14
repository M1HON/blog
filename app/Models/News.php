<?
namespace App\Models;
use App\Components\Database;
use PDO;
use Imagick;

Class News
{
   
    private $tablename = 'News';
    private $db;
    public $results_per_page =5;
    public function __construct()
    {
        $this->db= Database::connect_to_database();   
    }

    public function get_number_of_pages(){

        $result =  $this->db->query('SELECT id FROM '.$this->tablename);
        $number_of_results = $result->rowCount();
        $number_of_pages = ceil($number_of_results/$this->results_per_page);
        return $number_of_pages;
    }

    public function get_news($page_number){

       if (!isset($page_number) || empty($page_number)|| !is_numeric($page_number))  {
        $page_number = 1;
      
      }
  
            $number_of_pages = $this->get_number_of_pages();
            $first_limit = ($page_number)*$this->results_per_page-$this->results_per_page;
            $query =  $this->db->query('SELECT id, date, headline FROM '.$this->tablename.' ORDER BY date DESC LIMIT
                                      '.$first_limit.', '.$this->results_per_page.'');
            $result = $query->fetchAll();
            array_push($result, $number_of_pages);
            return $result;
        }
        public function get_post($post_id){
            $query =  $this->db->query('SELECT * FROM '.$this->tablename.' WHERE id = '.$post_id.'');
            $result = $query->fetch();
            return $result;
        }
    
    
        public function save_changes($post_id){
            if (isset($_POST)) {
                $date=date("Y-m-d");   
                $query =  $this->db->prepare('UPDATE '.$this->tablename.' SET headline="'.$_POST['headline'].'",
                 preview="'.$_POST['preview'].'", text="'.$_POST['text'].'", date="'.$date.'" WHERE id ='.$post_id.'');
                 //print_r($query) ;
                 $query->execute();
            }
            else {
                return FALSE;
            }
        }

        public function  save_post(){
            if (isset($_POST)) {


                $date=date("Y-m-d");   
                $query =  $this->db->prepare('INSERT INTO '.$this->tablename.' (headline, preview, text, date)
                 VALUES ("'.$_POST['headline'].'"," '.$_POST['preview'].'", "'.$_POST['text'].'", "'.$date.'")');
                $result= $query->execute();
                //print_r($query) ;
                return $this->db->lastInsertId();
      
            }
            else {
                return FALSE;
            }
        }
    
        public function post_upload_image($path, $id) {
        $img = new Imagick($path);
        move_uploaded_file($path, 'resources/assets/images/'.$id.'.jpg');
		$img->cropThumbnailImage(300, 300);
		$img->setImageCompressionQuality(80);
	}

        public function delete_post($id){
            $query =  $this->db->query('DELETE FROM '.$this->tablename.' WHERE id = '.$id.'');
            $result = $query->fetch();
            if (file_exists('resources/assets/images/'.$id.'.jpg')) {
                unlink('resources/assets/images/'.$id.'.jpg');
            }
            return TRUE;
        }

}
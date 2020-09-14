<?
namespace App\Controllers;
use App\Components\Controller;
class UserController extends Controller
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

public function login(){
	//$news = $this->news_model->login();
	return $this->templates->render('admin/login');
}
public function autorize(){
	$this->model->autorize();
	return $this->templates->render('admin/add');
}

public function logout(){
	session_unset();
	return $this->templates->redirect('');
}	
}
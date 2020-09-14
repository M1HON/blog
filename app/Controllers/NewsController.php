<?
namespace App\Controllers;
use App\Components\Controller;

class NewsController extends Controller
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

public function show_news(){
	$page_number= $this->data;
    //echo $page_number;
	$news = $this->model->get_news($page_number);
	return $this->templates->render('main/index', $news);
}

public function show_post(){
	$post_id= $this->data;
	$post = $this->model->get_post($post_id);

	return $this->templates->render('main/post', $post);
}

public function create_post(){
	return $this->templates->render('admin/add');
}

public function edit_news(){
	$page_number= $this->data;
	$post = $this->model->get_news($page_number);
	return $this->templates->render('admin/edit', $post);
}

public function save_changes(){
	$post_number= $this->data;
	//echo $post_number;
	$шв = $this->model->save_changes($post_number);
	if ($_FILES['img']['tmp_name']) {
		$this->model->post_upload_image($_FILES['img']['tmp_name'], $post_number);
	}
	return $this->templates->redirect('edit/1/');
}

public function change_news(){
	$page_number= $this->data;
	$post = $this->model->get_news($page_number);
	return $this->templates->render('admin/edit', $post);
}

public function change_post(){
	$post_id= $this->data;

	$post = $this->model->get_post($post_id);

	return $this->templates->render('admin/change', $post);
}
public function delete_news(){
	$post_id= $this->data;
	$this->model->delete_post($post_id);
	return $this->templates->redirect('edit/1/');
}
public function save_post(){
	$id = $this->model->save_post();
	if ($_FILES['img']['tmp_name']) {
		$this->model->post_upload_image($_FILES['img']['tmp_name'], $id);
	}
	return $this->templates->redirect('create');
}

}
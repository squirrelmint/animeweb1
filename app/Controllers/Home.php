<?php

namespace App\Controllers;

use App\Models\Video_Model;

class Home extends BaseController
{

	protected $base_backurl;
	public $path_setting = "";
	public $path_ads = "";
	public $branch = 1;
	public $backURL = "https://backend.gumovie1.com/public/";
	public $document_root = 'http://192.168.10.14:83/public/';
	public $path_thumbnail = "https://anime.vip-streaming.com/";

	public function __construct()
	{
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->VideoModel = new Video_Model();
		$this->branch = 1;

		// Directory
		$this->path_ads = $this->backURL . 'banners/';
		$this->path_setting = $this->backURL . 'setting/';

		helper(['url', 'pagination', 'dateformat']);
	}

	public function index()
	{

		$slide_anime = $this->VideoModel->get_slide($this->branch);
		$pagination = $this->VideoModel->get_list_video($this->branch);

		foreach ($pagination['list'] as $val) {
			$list_anime[] = $this->VideoModel->get_anime_data($val['movie_id']);
		}
		$ads = $this->VideoModel->get_path_imgads($this->branch);
		$list_category = $this->VideoModel->get_category($this->branch);
		$date = get_date($slide_anime[0]['movie_create']);

		// echo '<pre>' . print_r($list_anime, true) . '</pre>';
		// die;

		$chk_act = [
			'home' => 'active',
			'subthai' => '',
			'soundthai' => '',
			'category' => '',
		];

		$header_data = [
			'document_root' => $this->document_root,
			'list_category' => $list_category,
			'chk_act' => $chk_act,

		];
		$body_data = [
			'url_loadmore' => base_url() . '/animedata',
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime,
			'pagination' => $pagination,
			'ads' => $ads,
			'path_ads' => $this->path_ads,
			'slide_anime' => $slide_anime,
			'DateEng' => $date['DateEng'],


		];


		echo view('templates/header.php', $header_data);
		echo view('index.php', $body_data);
		echo view('templates/footer.php');
	}

	public function anime($id, $Name, $ep_index = 0, $Nameep)
	{
		$data_anime = $this->VideoModel->get_anime_data($id);
		$ads = $this->VideoModel->get_path_imgads($this->branch);

		$list_category = $this->VideoModel->get_category($this->branch);
		$date = get_date($data_anime['movie_create']);


		// echo '<pre>' . print_r($data_anime, true) . '</pre>';
		// die;
		$chk_act = [
			'home' => 'active',
			'subthai' => '',
			'soundthai' => '',
			'category' => '',
		];

		$header_data = [
			'document_root' => $this->document_root,
			'list_category' => $list_category,
			'chk_act' => $chk_act,

		];
		$body_data = [
			'url_loadmore' => base_url() . '/animedata',
			'path_thumbnail' => $this->path_thumbnail,
			'data_anime' => $data_anime,
			'ep_index' => $ep_index,
			'ads' => $ads,
			'path_ads' => $this->path_ads,
			'DateEng' => $date['DateEng'],
			'Nameep' => $Nameep,

		];
		echo view('templates/header.php', $header_data);
		echo view('anime.php', $body_data);
		echo view('templates/footer.php');
	}

	public function animedata()
	{
		$pagination = $this->VideoModel->get_list_video($this->branch, '', '', $_GET['page']);
		foreach ($pagination['list'] as $val) {
			$list_anime[] = $this->VideoModel->get_anime_data($val['movie_id']);
		}
		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime,


		];
		echo view('animedata.php', $header_data);
	}

	public function animedata_search()
	{
		$pagination = $this->VideoModel->get_list_video($this->branch, $_GET['keyword'], '', $_GET['page']);
		foreach ($pagination['list'] as $val) {
			$list_anime[] = $this->VideoModel->get_anime_data($val['movie_id']);
		}

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime,

		];
		echo view('animedata.php', $header_data);
	}

	public function animedata_category()
	{

		$pagination = $this->VideoModel->get_list_video($this->branch, '', $_GET['keyword'],  $_GET['page']);

		foreach ($pagination['list'] as $val) {
			$list_anime[] = $this->VideoModel->get_anime_data($val['movie_id']);
		}
		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime,

		];
		echo view('animedata.php', $header_data);
	}

	public function list() //ต้นแบบ หน้า cate / search
	{
		$list_category = $this->VideoModel->get_category($this->branch);
		// echo '<pre>' . print_r($list_category, true) . '</pre>';
		// die;
		$header_data = [
			'document_root' => $this->document_root,
			'list_category' => $list_category,

		];

		echo view('templates/header.php', $header_data);
		echo view('list.php');
		echo view('templates/footer.php');
	}

	public function search($keyword)
	{
		$list_anime = array() ;
		$keyword = urldecode($keyword);
		$pagination = $this->VideoModel->get_list_video($this->branch,  $keyword, '', $page = 1);


		foreach ($pagination['list'] as $val) {
			$list_anime[] = $this->VideoModel->get_anime_data($val['movie_id']);
		}
		$ads = $this->VideoModel->get_path_imgads($this->branch);
		$list_category = $this->VideoModel->get_category($this->branch);
		$chk_act = [
			'home' => 'active',
			'subthai' => '',
			'soundthai' => '',
			'category' => '',
		];

		$header_data = [
			'document_root' => $this->document_root,
			'list_category' => $list_category,
			'keyword' => $keyword,
			'chk_act' => $chk_act,
		];
		$body_data = [
			'url_loadmore' => base_url() . '/animedata_search',
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime,
			'pagination' => $pagination,

			'ads' => $ads,
			'path_ads' => $this->path_ads,

		];
		echo view('templates/header.php', $header_data);
		echo view('list.php', $body_data);
		echo view('templates/footer.php');
	}

	public function category($cate_id, $cate_name)
	{

		$pagination = $this->VideoModel->get_list_video($this->branch, "", $cate_id, $page = 1);

		foreach ($pagination['list'] as $val) {
			$list_anime[] = $this->VideoModel->get_anime_data($val['movie_id']);
		}
		$ads = $this->VideoModel->get_path_imgads($this->branch);
		$list_category = $this->VideoModel->get_category($this->branch);
		$chk_act = [
			'home' => '',
			'subthai' => '',
			'soundthai' => '',
			'category' => 'active',
		];

		// echo '<pre>' . print_r($pagination['list'], true) . '</pre>';
		// die;
		$header_data = [
			'document_root' => $this->document_root,
			'list_category' => $list_category,
			'list_anime' => $list_anime,
			'cate_id' => $cate_id,

			'chk_act' => $chk_act,
		];
		$body_data = [
			'cate_name' => urldecode($cate_name),
			'keyword' => $cate_id,
			'url_loadmore' => base_url() . '/animedata_category',
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime,
			'pagination' => $pagination,
			'ads' => $ads,
			'path_ads' => $this->path_ads,

		];
		echo view('templates/header.php', $header_data);
		echo view('list.php', $body_data);
		echo view('templates/footer.php');
	}





	public function player($id, $index)
	{
		$anime = $this->VideoModel->get_anime_data($id);
		$adsvideo = $this->VideoModel->get_adsvideolist($this->backURL);
		// echo '<pre>' . print_r($anime, true) . '</pre>';
		// 		die;
		if ($index != "") {
			$playerUrl = $anime['ep_data'][$index]['EpData'];
		}

		$data = [
			'document_root' => $this->document_root,
			'branch' 		=> $this->branch,
			'backUrl' 		=> $this->backURL,
			'adsvideo'		=> $adsvideo,
			'playerUrl' 	=> $playerUrl
		];

		echo view('player.php', $data);
	}
	public function countView($id)
	{
		$this->VideoModel->countView($id);
	}
}

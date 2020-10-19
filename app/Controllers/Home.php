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
	public $document_root = 'http://localhost:83/public/';
	public $path_thumbnail = "https://anime.vip-streaming.com/";

	public function __construct()
	{
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->VideoModel = new Video_Model();
		$this->branch = 1;

		// Directory
		$this->path_ads = $this->backURL . 'banner/';
		$this->path_setting = $this->backURL . 'setting/';

		helper(['url', 'pagination']);
	}

	public function index()
	{
		$list_anime = $this->VideoModel->get_list_video($this->branch);
		// $list_anime = 
		// echo '<pre>' . print_r($list_anime['list'], true) . '</pre>';
		// die;




		$header_data = [
			'document_root' => $this->document_root
		];
		$body_data = [
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime['list'],
			'pagination' => $list_anime,
		];


		echo view('templates/header.php', $header_data);
		echo view('index.php', $body_data);
		echo view('templates/footer.php');
	}

	public function anime()
	{
		$header_data = [
			'document_root' => $this->document_root
		];

		echo view('templates/header.php', $header_data);
		echo view('anime.php');
		echo view('templates/footer.php');
	}

	public function animedata()
	{
		$list_anime = $this->VideoModel->get_list_video($this->branch,'',$_GET['page']);


		// echo '<pre>' . print_r($list_anime['list'], true) . '</pre>';
		// die;
		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list_anime' => $list_anime['list'],

		];

		echo view('animedata.php', $header_data);
	}

	public function list()
	{
		$header_data = [
			'document_root' => $this->document_root
		];

		echo view('templates/header.php', $header_data);
		echo view('list.php');
		echo view('templates/footer.php');
	}

	public function player($id, $index)
	{
		$anime = $this->VideoModel->get_anime($id);
		$adsvideo = $this->VideoModel->get_adsvideolist($this->backURL);

		if ($index != "") {
			$playerUrl = $anime['data'][$index]['EpData'];
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
}

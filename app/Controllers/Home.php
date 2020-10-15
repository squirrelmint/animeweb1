<?php namespace App\Controllers;
use App\Models\Video_Model;

class Home extends BaseController
{

	protected $base_backurl;
	public $path_setting = "";
	public $path_ads = "";
	public $branch = 1;
	public $backURL = "https://backend.gumovie1.com/public/";
	public $document_root = 'http://localhost:83/public/';

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
		$header_data = [
			'document_root' => $this->document_root
		];

		echo view('templates/header.php',$header_data);
		echo view('index.php');
		echo view('templates/footer.php');
	}

	public function anime()
	{
		$header_data = [
			'document_root' => $this->document_root
		];

		echo view('templates/header.php',$header_data);
		echo view('anime.php');
		echo view('templates/footer.php');
	}

	public function animedata()
	{
		$header_data = [
			'document_root' => $this->document_root
		];

		echo view('animedata.php');
	}

	public function list()
	{
		$header_data = [
			'document_root' => $this->document_root
		];

		echo view('templates/header.php',$header_data);
		echo view('list.php');
		echo view('templates/footer.php');
	}

	public function player($id,$index)
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

		echo view('player.php',$data);
	}
}
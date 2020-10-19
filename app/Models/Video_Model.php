<?php



namespace App\Models;

use CodeIgniter\Email\Email;
use CodeIgniter\Model;



class Video_Model extends Model
{

    protected $table_movie = 'an_movie';
    protected $table_category = 'an_category';
    protected $an_moviecate = 'an_moviecate';
    protected $table_vdoads = 'an_adsvideo';
    protected $pathAdsVideo = 'movie/adsvdo';
    protected $ads = 'ads';
    protected $report_movie = 'an_report';
    protected $live_stream = 'an_livestream';
    protected $setting = 'setting';
    protected $content = 'content';
    protected $an_request = 'an_request';
    protected $seo = 'seo';
    public $backURL = "https://backend.gumovie1.com/public/";
    private $path_filelogo;

    public function __construct()
    {

        parent::__construct();
        $db = \Config\Database::connect();
        $this->path_filelogo = "logo";

    }



    function get_adsvideolist($backurl)
    {
        $sql = "SELECT 
					$this->table_vdoads.adsvideo_id,
					$this->table_vdoads.adsvideo_name,
					$this->table_vdoads.adsvideo_status,
					$this->table_vdoads.adsvideo_url as url,
					$this->table_vdoads.branch_id,
                    (
                        CASE
                        WHEN $this->table_vdoads.adsvideo_video IS NOT NULL THEN
                            CONCAT(
                                '$backurl',
                                '$this->pathAdsVideo',
                                '/',
                                $this->table_vdoads.adsvideo_video
                            )
                        END
                    ) AS 'file'
				FROM
					$this->table_vdoads
				WHERE $this->table_vdoads.branch_id = '1' AND $this->table_vdoads.adsvideo_status = 1";
        //echo $sql;die;

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_category($branch_id) // เรียก Category ตาม Branch 
    {

        $sql = "SELECT
            *
            FROM
            $this->table_category
            INNER JOIN $this->an_moviecate ON $this->an_moviecate.category_id = $this->table_category.category_id
            INNER JOIN $this->table_movie ON $this->an_moviecate.movie_id = $this->table_movie.movie_id
            WHERE
            `$this->table_category`.branch_id = ? AND $this->table_movie.movie_active = '1'
            GROUP BY $this->table_category.category_id";



        $query = $this->db->query($sql, [$branch_id]);

        return $query->getResultArray();
    }

    public function get_caterow($cate_id) // เรียก Category ตาม Branch 
    {

        $sql = "SELECT
                    *
                FROM
                    $this->table_category
                WHERE
                `$this->table_category`.category_id = ?";

        $query = $this->db->query($sql, [$cate_id]);
        return $query->getRowArray();

    }

    public function get_list_video($branchid, $keyword = "", $page = 1)
    {


        $sql_where = " ";

        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }


        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branchid'
                    AND `$this->table_movie`.movie_type IN ('mo','se') 
                    AND $this->table_movie.movie_active = '1' " . 
                    $sql_where. 
                "ORDER BY `$this->table_movie`.movie_id DESC";

        $query = $this->db->query($sql);

        $total = count($query->getResultArray());

        $perpage = 12;



        // return $query->getResultArray();

        return get_pagination($sql, $page, $perpage, $total);

    }

    public function get_movie_new_recommend($branchid, $keyword = "", $page = 1)
    {

        $sql_where = " ";

        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }

        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branchid'  
                    AND `$this->table_movie`.movie_active = '1' " . 
                    $sql_where;

        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 10;

        return get_pagination($sql, $page, $perpage, $total);

    }

    //Get video 
    public function get_movie_page_video($branchid)
    {

        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branchid' 
                    AND `$this->table_movie`.movie_active = '1' ";

        $query = $this->db->query($sql);
        return $query->getResultArray();

    }

    // Get video_movie
    public function get_id_video($id)
    {

        $sql = "SELECT
                    *
                FROM
                    `$this->table_movie`
                WHERE

                    `$this->table_movie`.movie_id = ? 
                    AND `$this->table_movie`.movie_active = '1'";



        $query = $this->db->query($sql, [$id]);
        return $query->getRowArray();
    }

    // Get video_series
    public function get_anime($id)
    {
        $sql = "SELECT
                    *
                FROM
                    `$this->table_movie`
                WHERE
                `$this->table_movie`.movie_id =" . $id;

        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $data[0]['data'] = $this->normalizeAnimetoArray($data[0]['movie_thmain']);
        unset($data[0]['movie_thmain']);

        return $data[0];
    }

    public function u_decode($input){
        return preg_replace_callback( 
            '/\\\\u([0-9a-zA-Z]{4})/', 
            function ($matches) {
                return mb_convert_encoding(pack('H*',$matches[1]),'UTF-8','UTF-16');
            } , 
            $input );
    }   

    public function normalizeAnimetoArray($str)
    {
        $str = $this->u_decode($str);
        $Arr = json_decode($str, true);

        $EpList = [];

        foreach ($Arr as $key => $item) {
            $EpData = [
                'NameEp' => $key,
                'EpData' => $item
            ];

            array_push($EpList, $EpData);
        }

        return $EpList;
    }


    public function get_path_imgads($branch_id)
    {

        $sql = "SELECT * FROM  `$this->ads` WHERE branch_id = '$branch_id'";

        $query = $this->db->query($sql);
        return $query->getResultArray();

    }

  

    
    public function get_id_video_bycategory($id, $branch_id, $page = 1, $keyword = "")
    {

        $sql_where = " ";

        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }

        $sql = "SELECT
                    *
                FROM
                    an_moviecate
                INNER JOIN an_movie ON an_moviecate.movie_id = an_movie.movie_id 
                WHERE 
                    an_moviecate.category_id = '$id' 
                    AND an_moviecate.branch_id = '$branch_id' ";

        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 28;

        return get_pagination($sql, $page, $perpage, $total);

    }

    public function get_list_video_search($keyword, $branch_id, $page)
    {
        if($page){
            $page=$page;
        }else{
            $page=1;
        }

        $sql_where = " ";
        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }

        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branch_id' AND `$this->table_movie`.movie_active = '1' $sql_where ";

        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 28;

        return get_pagination($sql, $page, $perpage, $total);

    }

    //แจ้งหนังเสีย
    public function save_reports($branch, $id, $reason)
    {

        $bd =  $this->db->table($this->report_movie);
        $this->db->transBegin();

        $data =  [
            'movie_id' =>  $id,
            'branch_id' => $branch,
            'reason' => $reason
        ];

        try {

            if ($bd->insert($data) == true) {
                $this->db->transCommit();
                return true;
            }

        } catch (\Exception $e) {

            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            return $e->getMessage();

        }

    }

   
    //ขอหนัง 
    public function save_requests($branch, $movie)
    {

        $bd =  $this->db->table($this->an_request);
        $this->db->transBegin();

        $data =  [
            'branch_id' => $branch,
            'an_request' => $movie
        ];

        try {

            if ($bd->insert($data) == true) {
                $this->db->transCommit();
                return true;
            }

        } catch (\Exception $e) {

            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            return $e->getMessage();

        }

    }


    // นับจำนวนผู้ชม
    public function movie_view($movie_id)
    {

        $sql = "SELECT
                    `$this->table_movie`.movie_id,
                    `$this->table_movie`.movie_view
                FROM
                    $this->table_movie
                WHERE `$this->table_movie`.movie_id = '$movie_id' ";

        $query = $this->db->query($sql);
        $data = $query->getResultArray();

        if ($data[0]['movie_view'] == 0 && empty($data[0]['movie_view']) ) {

            $movie_view = 1;

        } else {

            $movie_view = $data[0]['movie_view']++;

        }

        $builder = $this->db->table($this->table_movie);
        $builder->where('movie_id', $movie_id);
        $this->db->transBegin();

        $dataadd =  [
            'movie_view' =>  $movie_view,
        ];


        try {

            if ($builder->update($dataadd) == true) {

                $this->db->transCommit();
                // return true;

            }

        } catch (\Exception $e) {

            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            // return $e->getMessage();

        }

        return $movie_view;

    }

    //หนังที่น่สนใจ 2 
    public function get_video_interest($branch)
    {

        $this->db->simpleQuery('SET @@group_concat_max_len = 100000');
        $sql = "SELECT
                    an_category.category_id,
                    an_category.category_name,
                    GROUP_CONCAT(
                        mo.movie_id,
                        '{-}',
                        mo.movie_thname,
                        '{-}',
                        mo.movie_ratescore,
                        '{-}',
                        mo.movie_view,
                        '{-}',
                        mo.movie_type,
                        '{-}',
                        mo.movie_quality,
                        '{-}',
                        mo.movie_picture SEPARATOR '|'
                    ) AS movie
                FROM
                    an_category
                LEFT JOIN (
                    SELECT
                        an_movie.movie_id,
                        an_movie.movie_thname,
                        an_movie.movie_picture,
                        an_movie.movie_type,
                        an_movie.movie_quality,
                        an_movie.movie_ratescore,
                        CASE
                            WHEN an_movie.movie_view IS NULL THEN '0'
                            ELSE an_movie.movie_view
                        END AS movie_view,
                        an_moviecate.category_id
                    FROM
                        an_movie
                    INNER JOIN an_moviecate ON an_moviecate.movie_id = an_movie.movie_id
                    GROUP BY an_movie.movie_id   
                ) mo ON mo.category_id = an_category.category_id
                WHERE an_category.branch_id = '$branch' AND mo.movie_id IS NOT NULL
                GROUP BY an_category.category_id
                ORDER BY count(an_category.category_id) DESC
                LIMIT 4; ";

      
        $query = $this->db->query($sql);
        return $query->getResultArray();
    
    }




}


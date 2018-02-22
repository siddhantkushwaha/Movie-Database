<?php 
require_once("con.php");
session_start();
class Functions
{
    public function __construct()
    {
		$connect=new Config();
		$this->db=$connect->connection();
				date_default_timezone_set("Asia/Kolkata");
    }

    public function show_movies(){
        $res = $this->db->query("SELECT movie_name, cover_link, synopsis, torrent_link, rating, duration, gross, year FROM Movies where mid <= 5");
        if($res)
        {
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    public function sortMovieAccordingToRatings($rate)
    {
        $res = $this->db->query("SELECT movie_name, cover_link, synopsis, torrent_link, rating, duration, gross, year FROM Movies WHERE rating>='$rate' ");
        if($res)
        {
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}
$functions = new Functions();
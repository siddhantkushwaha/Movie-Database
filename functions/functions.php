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
        $res = $this->db->query("SELECT * FROM Movies where mid <= 5");
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
    }

    public function sortMovieAccordingToRatings($rate)
    {
        $res = $this->db->query("SELECT * FROM Movies WHERE rating>='$rate' ");
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
    }
    public function sortMovieAccordingToGenres($genre)
    {
        $res = $this->db->query("SELECT * FROM Movies WHERE rating>='$genre' ");
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
    }
    public function show_Actors()
    {
        $res = $this->db->query("SELECT actor_name ,birth_date ,birth_place ,img_url FROM Actors where aid <= 5");
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
    }
    public function show_Directors()
    {
        $res = $this->db->query("SELECT dir_name ,birth_date ,birth_place ,img_url FROM Directors where did <= 5");
            if($res->num_rows > 0)
            {
                return $res;
            }
            else
            {
                return FALSE;
            }
    }
}
$functions = new Functions();
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
        //echo "query";
        $res = $this->db->query("SELECT * from movies where mid in 
                                        (select mid from movie_has_genres where gid in 
                                                (select gid from genres where genre_type='$genre'));");
        // $res = $this->db->query("select * from movies where mid=10000"); 
        //echo "first";
        if($res->num_rows > 0)
            {
                echo "hello";
                return $res;
            }
            else
            {
                return FALSE;
            }
    }
    public function sortMovieAccordingToYear($year)
    {
        $res = $this->db->query("SELECT * FROM Movies WHERE year='$year' ");
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
    public function insert_movie($movie_name, $synopsis, $rating, $year, $gross, $duration, $cover_link, $torrent_link,$contributor){

        // echo $movie_name, $synopsis, $rating, $year, $gross, $duration, $cover_link, $torrent_link, "detail functions";
        $res = $this->db->query("INSERT INTO Movies (movie_name,synopsis,rating,year,gross,duration,cover_link,torrent_link,contributor) 
        VALUES ('$movie_name','$synopsis','$rating','$year','$gross','$duration','$cover_link','$torrent_link','$contributor')");
        // if($ins->num_rows > 0){
        //     return $ins;
        // }
        // else{
        //     return FALSE;
        // }
        if($res == null)
            return $this->db->error_get_last;
        return $res;
    }
}
$functions = new Functions();
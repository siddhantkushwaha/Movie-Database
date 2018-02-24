<?php
require_once("con.php");
session_start();
class Functions
{
    public function __construct()
    {
        $connect  = new Config();
        $this->db = $connect->connection();
        date_default_timezone_set("Asia/Kolkata");
    }
    
    public function show_movies()
    {
        $res = $this->db->query("SELECT * FROM Movies where mid <= 5");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function sortMovieAccordingToRatings($rate)
    {
        $res = $this->db->query("SELECT * FROM Movies WHERE rating>='$rate' ");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function sortMovieAccordingToGenres($genre)
    {
        $res = $this->db->query("SELECT * from movies where mid in 
                                        (select mid from movie_has_genres where gid in 
                                                (select gid from genres where genre_type='$genre'));");
        if ($res->num_rows > 0) {
            echo "hello";
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function sortMovieAccordingToYear($year)
    {
        $res = $this->db->query("SELECT * FROM Movies WHERE year='$year'");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function show_Actors()
    {
        $res = $this->db->query("SELECT * FROM Actors ORDER BY RAND() LIMIT 12");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function show_Directors()
    {
        $res = $this->db->query("SELECT * FROM Directors ORDER BY RAND() LIMIT 12");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function insert_movie($movie_name, $synopsis, $rating, $year, $gross, $duration, $cover_link, $torrent_link, $contributor)
    {
        
        $res = $this->db->query("INSERT INTO Movies (movie_name,synopsis,rating,year,gross,duration,cover_link,torrent_link,contributor) 
        VALUES ('$movie_name','$synopsis','$rating','$year','$gross','$duration','$cover_link','$torrent_link','$contributor')");
        return $res;
    }
    
    public function show_movie_actors($movie_id)
    {
        echo $movie_id;
        $res = $this->db->query("SELECT * FROM Actors WHERE aid in (SELECT aid FROM movie_has_actors WHERE mid = '$movie_id')");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }
    
    public function show_movie_directors($movie_id)
    {
        $res = $this->db->query("SELECT * FROM Directors WHERE did in (SELECT did FROM movie_has_directors WHERE mid = '$movie_id')");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }
}
$functions = new Functions();
select movie_name from movies where mid in 
    (select mid from movie_has_genres where gid in 
        (select gid from genres where genre_type='$genre'));
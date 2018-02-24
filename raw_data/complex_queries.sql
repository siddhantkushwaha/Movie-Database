select movie_name from movies where mid in 
    (select mid from movie_has_genres where gid in 
        (select gid from genres where genre_type='$genre'));

mysqldump -u root -p movie_database > movie_database.sql

mysql movie_database -u root -p < "/Users/udaysawhney/Desktop/dbms_project/dbms_project/movie_database.sql"

ALTER TABLE Movies MODIFY COLUMN mid INT auto_increment;
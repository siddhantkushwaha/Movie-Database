select movie_name from movies where mid in 
    (select mid from movie_has_genres where gid in 
        (select gid from genres where genre_type='$genre'));

mysqldump -u root -p movie_database > movie_database.sql

mysql movie_database -u root -p < "/Users/udaysawhney/Desktop/dbms_project/dbms_project/movie_database.sql"

ALTER TABLE Movies MODIFY COLUMN mid INT auto_increment;

update actors set img_url="https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png" where img_url = "http://st1.bgr.in/wp-content/uploads/2015/11/anonymous-hackers-stock-image.jpg";
update directors set img_url="https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png" where img_url = "http://st1.bgr.in/wp-content/uploads/2015/11/anonymous-hackers-stock-image.jpg";

ALTER TABLE Actors MODIFY COLUMN img_url VARCHAR(200) DEFAULT "https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png";
ALTER TABLE Directors MODIFY COLUMN img_url VARCHAR(200) DEFAULT "https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png";
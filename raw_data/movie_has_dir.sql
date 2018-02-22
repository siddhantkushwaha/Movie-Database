use movie_database;

CREATE TABLE movie_has_directors(
    did int,
    mid int,
    PRIMARY KEY(mid, did)
);

load data local infile "/Users/siddhantkushwaha/Desktop/movie_has_dir.txt" into table movie_has_directors fields terminated by ' ';

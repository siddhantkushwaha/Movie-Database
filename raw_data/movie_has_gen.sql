use movie_database;

CREATE TABLE movie_has_genres(
    gid int,
    mid int,
    PRIMARY KEY(mid, gid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/movie_has_gen.txt" into table movie_has_genres fields terminated by ' ';

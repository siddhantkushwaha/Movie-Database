use movie_database;
CREATE TABLE movie_has_actors(
    aid int,
    mid int,
    PRIMARY KEY(mid, aid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/mq.txt" into table movie_has_actors fields terminated by ' ';

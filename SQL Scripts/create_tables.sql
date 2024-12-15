DROP DATABASE IF EXISTS fut_database ;
create DATABASE fut_database;
USE fut_database;
CREATE TABLE players(
    player_id INT PRIMARY KEY AUTO_INCREMENT,
    p_name VARCHAR(50),
    photo VARCHAR(255),
    position CHAR(2),
    availibility BOOLEAN,
    rating decimal(2),
    nation_id INT,
    club_id INT 
);

CREATE TABLE players_stats(
    player_id INT PRIMARY KEY,
    diving_or_pace INT(2),
    handling_or_shooting INT(2),
    kicking_or_passing INT(2),
    reflexes_or_dribbling INT(2),
    speed_or_defending INT(2),
    positioning_or_physical INT(2)
);

CREATE TABLE clubs(
    club_id INT PRIMARY KEY AUTO_INCREMENT,
    club_name varchar(50),
    club_logo varchar(255)
);


CREATE TABLE nations(
    nation_id INT PRIMARY KEY AUTO_INCREMENT,
    nation_name varchar(50),
    nation_logo varchar(255)
);

alter table players_stats 
Add foreign key 
(player_id) references players(player_id)
ON UPDATE CASCADE 
ON DELETE CASCADE ;
alter table players Add foreign key (nation_id) references nations(nation_id) ON UPDATE CASCADE 
ON DELETE CASCADE ;
alter table players Add foreign key (club_id) references clubs(club_id) ON UPDATE CASCADE 
ON DELETE CASCADE ;



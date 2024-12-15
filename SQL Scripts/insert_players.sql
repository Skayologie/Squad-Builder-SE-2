-- SQL Script That Insert Players Data To The Database
-- Note : Execute The Script 'insert_nations.sql' and 'insert_clubs.sql' First For Insert The Nations & Clubs Data & Stats Before Execute This Script . 
USE fut_database;

INSERT INTO players (p_name, photo, position, availibility, rating, nation_id, club_id) VALUES
("Lionel Messi", "https://cdn.sofifa.net/players/158/023/25_120.png", "RW", TRUE, 93, 52, 659),
("Cristiano Ronaldo", "https://cdn.sofifa.net/players/020/801/25_120.png", "ST", TRUE, 91, 38, 605),
("Kevin De Bruyne", "https://cdn.sofifa.net/players/192/985/25_120.png", "CM", TRUE, 91, 7, 8),
("Kylian Mbappé", "https://cdn.sofifa.net/players/231/747/25_120.png", "ST", TRUE, 92, 18, 106),
("Virgil van Dijk", "https://cdn.sofifa.net/players/203/376/25_120.png", "CB", TRUE, 90, 34, 7),
("Antonio Rudiger", "https://cdn.sofifa.net/players/205/452/25_120.png", "CB", TRUE, 88, 21, 106),
("Neymar Jr", "https://cdn.sofifa.net/players/190/871/25_120.png", "LW", TRUE, 90, 54, 196),
("Mohamed Salah", "https://cdn.sofifa.net/players/192/985/25_120.png", "RW", TRUE, 89, 111, 7),
("Joshua Kimmich", "https://cdn.sofifa.net/players/212/622/25_120.png", "CM", TRUE, 89, 21, 17),
("Jan Oblak", "https://cdn.sofifa.net/players/200/389/25_120.png", "GK", TRUE, 91, 44, 756),
("Luka Modrić", "https://cdn.sofifa.net/players/177/003/25_120.png", "CM", TRUE, 88, 10, 106),
("Vinicius Junior", "https://cdn.sofifa.net/players/238/794/25_120.png", "LW", TRUE, 89, 54, 106),
("Brahim Diáz", "https://cdn.sofifa.net/players/231/410/25_120.png", "LW", TRUE, 82, 129, 106),
("Karim Benzema", "https://cdn.sofifa.net/players/165/153/25_120.png", "ST", TRUE, 90, 18, 197),
("Erling Haaland", "https://cdn.sofifa.net/players/239/085/25_120.png", "ST", TRUE, 91, 36, 8),
("N'Golo Kanté", "https://cdn.sofifa.net/players/215/914/25_120.png", "CDM", TRUE, 87, 18, 197),
("Alphonso Davies", "https://cdn.sofifa.net/players/234/396/25_120.png", "LB", TRUE, 84, 70, 17),
("Yassine Bounou", "https://cdn.sofifa.net/players/209/981/25_120.png", "GK", TRUE, 84, 129, 196),
("Bruno Fernandes", "https://cdn.sofifa.net/players/212/198/25_120.png", "CM", TRUE, 88, 38, 9),
("Jadon Sancho", "https://cdn.sofifa.net/players/233/049/25_120.png", "LW", TRUE, 84, 14, 9),
("Trent Alexander-Arnold", "https://cdn.sofifa.net/players/231/281/25_120.png", "RB", TRUE, 87, 14, 7),
("Achraf Hakimi", "https://cdn.sofifa.net/players/235/212/25_120.png", "RB", TRUE, 84, 129, 50),
("Youssef En-Nesyri", "https://cdn.sofifa.net/players/235/410/25_120.png", "ST", TRUE, 83, 129, 139),
("Noussair Mazraoui", "https://cdn.sofifa.net/players/236/401/25_120.png", "LB", TRUE, 81, 129, 9),
("Ismael Saibari", "https://cdn.sofifa.net/players/259/480/25_120.png", "CM", TRUE, 83, 129, 110),
("Gianluigi Donnarumma", "https://cdn.sofifa.net/players/230/621/25_120.png", "GK", TRUE, 89, 27, 50);

CREATE USER 'avengersUser'@'127.0.0.1' IDENTIFIED BY 'avengersAccountPassword1*';

GRANT ALL PRIVILEGES ON avengers_maperi_isaia.* TO 'avengersUser'@'127.0.0.1';

FLUSH PRIVILEGES;

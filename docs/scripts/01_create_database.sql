CREATE SCHEMA `dinosaurios` ;
CREATE USER 'dinosaurios'@'127.0.0.1' IDENTIFIED WITH mysql_native_password BY 'Galileo1998';
GRANT ALL ON dinosaurios.* TO 'dinosaurios'@'127.0.0.1';

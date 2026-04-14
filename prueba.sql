CREATE TABLE prueba (
ID_Prueba int(11) DEFAULT '0' NOT NULL auto_increment,
Nombre varchar(100),
Apellidos varchar(100),
PRIMARY KEY (ID_Prueba),
UNIQUE ID_Prueba (ID_Prueba)
);
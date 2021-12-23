CREATE DATABASE IF NOT EXISTS inventariohw;
USE inventariohw;

CREATE TABLE utente(
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
cognome VARCHAR(255),
email VARCHAR(255),
password VARCHAR(64),
is_admin BOOLEAN,
is_enable BOOLEAN);

CREATE TABLE aula(
id INT PRIMARY KEY,
descrizione VARCHAR(255));

CREATE TABLE tipo(
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
descrizione VARCHAR(255));

CREATE TABLE componente(
id INT PRIMARY KEY AUTO_INCREMENT,
marca VARCHAR(255),
descrizione VARCHAR(255),
numero_seriale VARCHAR(255),
data_installazione DATE,
utente_id INT,
tipo_id INT,
aula_id INT,
is_enable BOOLEAN,
FOREIGN KEY (utente_id) REFERENCES utente(id),
FOREIGN KEY (tipo_id) REFERENCES tipo(id),
FOREIGN KEY (aula_id) REFERENCES aula(id));


INSERT INTO utente(nome, cognome, email, password, is_admin, is_enable) 
VALUES('Andrea','Curti','andrea.curti@samtrevano.ch', 
'f526440862c83b4fbe550f700e1cd11f38a09b1dabf62401f6491e04b3c76460', TRUE, TRUE);

INSERT INTO utente(nome, cognome, email, password, is_admin, is_enable) 
VALUES('John','Doe','john.doe@gmail.com', 
'4d22840221dd1c5642f54bf34b97a206e47836cde880af828b1445b78bb43dd9', FALSE, TRUE);



INSERT INTO tipo(nome, descrizione) 
VALUES('Computer','PC and Mac');

INSERT INTO tipo(nome, descrizione) 
VALUES('Tastiera','Tastiere per Windows e Mac');

INSERT INTO tipo(nome, descrizione) 
VALUES('Mouse','Mouse per Windows e Mac');

INSERT INTO tipo(nome, descrizione) 
VALUES('Monitor','Monitor di varie marche');

INSERT INTO tipo(nome, descrizione) 
VALUES('Proiettore','Proiettore DLP o LCD');

INSERT INTO aula(id, descrizione) 
VALUES(1,'Magazzino');

INSERT INTO aula(id, descrizione) 
VALUES(420,'Aula informatica');

INSERT INTO aula(id, descrizione) 
VALUES(428,'Aula informatica');

INSERT INTO aula(id, descrizione) 
VALUES(327,'Aula maturita');


INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, 
utente_id, tipo_id, aula_id, is_enable) 
VALUES('HP','PC da 8GB Ram con i5', 'CZC6518DJ9', CURDATE(), 1, 1, 1, TRUE);

INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, 
utente_id, tipo_id, aula_id, is_enable) 
VALUES('Samsung','PC da 16GB Ram con i7', 'DZF7431GL8', CURDATE(), 1, 1, 1, TRUE);

INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, 
utente_id, tipo_id, aula_id, is_enable) 
VALUES('MAC','PC da 4GB Ram con i3', 'GHC1819LQ6', CURDATE(), 1, 1, 1, TRUE);

INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, 
utente_id, tipo_id, aula_id, is_enable) 
VALUES('HP','Tastiera', 'WSAQ722MC9', CURDATE(), 1, 2, 1, TRUE);

INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, 
utente_id, tipo_id, aula_id, is_enable) 
VALUES('HP','Tastiera', 'FSGA013BT7', CURDATE(), 1, 2, 1, FALSE);

INSERT INTO componente(marca, descrizione, numero_seriale, data_installazione, 
utente_id, tipo_id, aula_id, is_enable) 
VALUES('HP','Mouse belo', 'SKJA0159E8', CURDATE(), 1, 3, 1, FALSE);


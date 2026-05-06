CREATE DATABASE Regime;
Use Regime;
CREATE TABLE Genre(
    Id INT PRIMARY KEY auto_increment,
    TypeGenre VARCHAR(10)
);
CREATE TABLE UserType(
    Id INT PRIMARY KEY auto_increment,
    UserType VARCHAR(10)
);
CREATE TABLE User(
    Id INT PRIMARY KEY auto_increment,
    Nom VARCHAR(50),
    Prenom VARCHAR(20),
    Email VARCHAR(20),
    MotDePasse VARCHAR(20),
    IdUserType INT DEFAULT 2,
    FOREIGN KEY (IdUserType) REFERENCES UserType(Id),
    IdGenre INT,
    FOREIGN KEY (IdGenre) REFERENCES Genre(Id)
);
CREATE TABLE TypeRegime(
    Id INT PRIMARY KEY auto_increment,
    TypeRegime VARCHAR(10)
);
CREATE TABLE Regime(
    Id INT PRIMARY KEY auto_increment,
    NomRegime VARCHAR(50),
    IdTypeRegime INT,
    FOREIGN KEY (IdTypeRegime) REFERENCES TypeRegime(Id),
    Prix DECIMAL(10,2),
    efficacite INT
);
CREATE TABLE UserInfo(
    IdUser INT,
    FOREIGN KEY (IdUser) REFERENCES User(Id),
    Poids DECIMAL(5,2),
    Taille DECIMAL(3,2),
    insertedAt DATE
);
CREATE TABLE UserRegime(
    IdUser INT,
    FOREIGN KEY (IdUser) REFERENCES User(Id),
    IdRegime INT,
    FOREIGN KEY (IdRegime) REFERENCES Regime(Id)
);
CREATE TABLE Code(
    Id INT PRIMARY KEY auto_increment,
    Valeur DECIMAL(10,2),
    Code VARCHAR(50)
);
CREATE TABLE TypeSport(
    Id INT PRIMARY KEY auto_increment,
    ActionSport VARCHAR(20)
);
CREATE TABLE Sport(
    Id INT PRIMARY KEY auto_increment,
    Nom VARCHAR(20),
    IdTypeSport INT,
    FOREIGN KEY (IdTypeSport) REFERENCES TypeSport(Id)
);
CREATE TABLE RegimeComponente(
    IdRegime INT,
    FOREIGN KEY (IdRegime) REFERENCES Regime(Id),
    viande DECIMAL(4,1),
    Poisson DECIMAL(4,1),
    Volaille DECIMAL(4,1)
);










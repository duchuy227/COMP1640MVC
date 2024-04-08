CREATE TABLE `Role` (
    `Role_ID` INT(11) Not Null AUTO_INCREMENT,
    `Role_Name` varchar(255) Not Null,
    PRIMARY KEY (`Role_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Faculty` (
    `Fa_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Fa_Name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Fa_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Admin` (
    `Ad_ID` INT(11) NOT Null AUTO_INCREMENT,
    `Ad_Username` varchar(255) Not Null,
    `Ad_Password` varchar(255) Not Null,
    `Ad_Email` varchar(255) Not Null,
    `Ad_DOB` date Not NULL, 
    `Role_ID` int(11) Not Null,
    PRIMARY KEY (`Ad_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Manager` (
    `Ma_ID` INT(11) NOT Null AUTO_INCREMENT,
    `Ma_Username` varchar(255) Not Null,
    `Ma_Password` varchar(255) Not Null,
    `Ma_Email` varchar(255) Not Null,
    `Ma_DOB` date Not NULL, 
    `Role_ID` int(11) Not Null,
    PRIMARY KEY (`Ma_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Student` (
    `Stu_ID` INT(11) NOT Null AUTO_INCREMENT,
    `Stu_Username` varchar(255) Not Null,
    `Stu_Password` varchar(255) Not Null,
    `Stu_Email` varchar(255) Not Null,
    `Stu_FullName` varchar(255) Not Null,
    `Stu_DOB` date Not NULL, 
    `Role_ID` int(11) Not Null,
    `Fa_ID` int (11) Not Null,
    PRIMARY KEY (`Stu_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Coordinator` (
    `Coor_ID` INT(11) NOT Null AUTO_INCREMENT,
    `Coor_Username` varchar(255) Not Null,
    `Coor_Password` varchar(255) Not Null,
    `Coor_Email` varchar(255) Not Null,
    `Coor_FullName` varchar(255) Not Null,
    `Coor_DOB` date Not NULL, 
    `Role_ID` int(11) Not Null,
    `Fa_ID` int (11) Not Null,
    PRIMARY KEY (`Coor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Mail` (
    `Mail_ID` INT(11) NOT Null AUTO_INCREMENT,
    `Stu_ID` int(11) Not Null,
    `Coor_ID` int(11) Not Null,
    `Content` varchar(255) Not Null,
    PRIMARY KEY (`Mail_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


Create TABLE `Topic` (
    `Topic_ID` INT(11) NOT Null AUTO_INCREMENT,
    `Topic_Name` varchar(255) Not Null,
    `Topic_StartDate` DATETIME NOT NULL,
    `Topic_ClosureDate` DATETIME NOT NULL,
    `Topic_FinaleDate` DATETIME NOT NULL,
    `Topic_Description` VARCHAR(255) Not Null,
    `Fa_ID` int(11) not null,
    PRIMARY KEY (`Topic_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Create TABLE `Contribution` (
    `Con_ID` int(11) NOT Null AUTO_INCREMENT,
    `Con_Name` varchar(255) Not Null,
    `Con_SubmissionTime` timestamp NULL DEFAULT current_timestamp(),
    `Con_Status` varchar(255) Not Null,
    `Con_Doc` varchar(255) Not null,
    `Con_Image` varchar(255) Not Null,
    `Stu_ID` int(11) Not null,
    `Topic_ID` int(11) Not null,
    `Com_ID` int(11) Not Null,
    `Maga_ID` int(11) Not null,
    PRIMARY KEY (`Con_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Comments` (
    `Com_ID` int(11) Not Null AUTO_INCREMENT,
    `Com_Detail` varchar(255) Not Null,
    `Con_ID` int(11) Not Null,
    `Coor_ID` int (11) Not Null,
    PRIMARY Key (`Com_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Create TABLE `Magazine` (
    `Maga_ID` int(11) Not Null AUTO_INCREMENT,
    `Maga_Status` VARCHAR(255) Not null,
    `Maga_CreateTime` DATETIME Not Null,
    `Con_ID` int(11) Not Null,
    PRIMARY KEY (`Maga_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Admin`
    ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `Role` (`Role_ID`);

ALTER TABLE `Manager`
    ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `Role` (`Role_ID`);

ALTER TABLE `Student`
    ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `Role` (`Role_ID`),
    ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Fa_ID`) REFERENCES `Faculty` (`Fa_ID`);

ALTER TABLE `Coordinator`
    ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `Role` (`Role_ID`),
    ADD CONSTRAINT `coordinator_ibfk_2` FOREIGN KEY (`Fa_ID`) REFERENCES `Faculty` (`Fa_ID`);

ALTER TABLE `Mail`
    ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`Stu_ID`) REFERENCES `Student` (`Stu_ID`),
    ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`Coor_ID`) REFERENCES `Coordinator` (`Coor_ID`);

ALTER TABLE `Topic`
    ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`Fa_ID`) REFERENCES `Faculty` (`Fa_ID`);

ALTER TABLE `Magazine`
    ADD CONSTRAINT `magazine_ibfk_1` FOREIGN KEY (`Con_ID`) REFERENCES `Contribution` (`Con_ID`);

ALTER TABLE `Comments`
    ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Con_ID`) REFERENCES `Contribution` (`Con_ID`),
    ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Coor_ID`) REFERENCES `Coordinator` (`Coor_ID`);

ALTER TABLE `Contribution`
    ADD CONSTRAINT `contribution_ibfk_1` FOREIGN KEY (`Stu_ID`) REFERENCES `Student` (`Stu_ID`),
    ADD CONSTRAINT `contribution_ibfk_2` FOREIGN KEY (`Topic_ID`) REFERENCES `Topic` (`Topic_ID`),
    ADD CONSTRAINT `contribution_ibfk_3` FOREIGN KEY (`Com_ID`) REFERENCES `Comments` (`Com_ID`),
    ADD CONSTRAINT `contribution_ibfk_4` FOREIGN KEY (`Maga_ID`) REFERENCES `Magazine` (`Maga_ID`);
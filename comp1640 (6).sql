CREATE TABLE `admin` (
  `Ad_ID` int(11) NOT NULL,
  `Ad_Username` varchar(255) NOT NULL,
  `Ad_Password` varchar(255) NOT NULL,
  `Ad_Email` varchar(255) NOT NULL,
  `Ad_DOB` date NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `Image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `comments` (
  `Com_ID` int(11) NOT NULL,
  `Com_Detail` varchar(1000) NOT NULL,
  `Con_ID` int(11) NOT NULL,
  `Coor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `contribution` (
  `Con_ID` int(11) NOT NULL,
  `Con_Name` varchar(255) NOT NULL,
  `Con_Description` varchar(1000) NOT NULL,
  `Con_SubmissionTime` timestamp NULL DEFAULT current_timestamp(),
  `Con_Status` varchar(255) NOT NULL,
  `Con_Doc` varchar(255) NOT NULL,
  `Con_Image` longblob NOT NULL,
  `Stu_ID` int(11) NOT NULL,
  `Topic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `coordinator` (
  `Coor_ID` int(11) NOT NULL,
  `Coor_Username` varchar(255) NOT NULL,
  `Coor_Password` varchar(255) NOT NULL,
  `Coor_Email` varchar(255) NOT NULL,
  `Coor_FullName` varchar(255) NOT NULL,
  `Coor_DOB` date NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `Fa_ID` int(11) NOT NULL,
  `Image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `faculty` (
  `Fa_ID` int(11) NOT NULL,
  `Fa_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `magazine` (
  `Maga_ID` int(11) NOT NULL,
  `Maga_Status` varchar(255) NOT NULL,
  `Maga_CreateTime` datetime NOT NULL,
  `Con_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mail` (
  `Mail_ID` int(11) NOT NULL,
  `Stu_ID` int(11) NOT NULL,
  `Coor_ID` int(11) NOT NULL,
  `Content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `manager` (
  `Ma_ID` int(11) NOT NULL,
  `Ma_Username` varchar(255) NOT NULL,
  `Ma_Password` varchar(255) NOT NULL,
  `Ma_Email` varchar(255) NOT NULL,
  `Ma_DOB` date NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `Image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `role` (
  `Role_ID` int(11) NOT NULL,
  `Role_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `student` (
  `Stu_ID` int(11) NOT NULL,
  `Stu_Username` varchar(255) NOT NULL,
  `Stu_Password` varchar(255) NOT NULL,
  `Stu_Email` varchar(255) NOT NULL,
  `Stu_FullName` varchar(255) NOT NULL,
  `Stu_DOB` date NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `Fa_ID` int(11) NOT NULL,
  `Image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `topic` (
  `Topic_ID` int(11) NOT NULL,
  `Topic_Name` varchar(255) NOT NULL,
  `Topic_StartDate` datetime NOT NULL,
  `Topic_ClosureDate` datetime NOT NULL,
  `Topic_FinalDate` datetime NOT NULL,
  `Topic_Description` varchar(255) NOT NULL,
  `Topic_Image` longblob NOT NULL,
  `Fa_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `admin`
  ADD PRIMARY KEY (`Ad_ID`),
  ADD KEY `admin_ibfk_1` (`Role_ID`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`Com_ID`),
  ADD KEY `comments_ibfk_1` (`Con_ID`),
  ADD KEY `comments_ibfk_2` (`Coor_ID`);

ALTER TABLE `contribution`
  ADD PRIMARY KEY (`Con_ID`),
  ADD KEY `contribution_ibfk_1` (`Stu_ID`),
  ADD KEY `contribution_ibfk_2` (`Topic_ID`);

ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`Coor_ID`),
  ADD KEY `coordinator_ibfk_1` (`Role_ID`),
  ADD KEY `coordinator_ibfk_2` (`Fa_ID`);


ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Fa_ID`);

ALTER TABLE `magazine`
  ADD PRIMARY KEY (`Maga_ID`),
  ADD KEY `magazine_ibfk_1` (`Con_ID`);

ALTER TABLE `mail`
  ADD PRIMARY KEY (`Mail_ID`),
  ADD KEY `mail_ibfk_1` (`Stu_ID`),
  ADD KEY `mail_ibfk_2` (`Coor_ID`);

ALTER TABLE `manager`
  ADD PRIMARY KEY (`Ma_ID`),
  ADD KEY `manager_ibfk_1` (`Role_ID`);

ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_ID`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`Stu_ID`),
  ADD KEY `student_ibfk_1` (`Role_ID`),
  ADD KEY `student_ibfk_2` (`Fa_ID`);

ALTER TABLE `topic`
  ADD PRIMARY KEY (`Topic_ID`),
  ADD KEY `topic_ibfk_1` (`Fa_ID`);

ALTER TABLE `admin`
  MODIFY `Ad_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `comments`
  MODIFY `Com_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `contribution`
  MODIFY `Con_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `coordinator`
  MODIFY `Coor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `faculty`
  MODIFY `Fa_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `magazine`
  MODIFY `Maga_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mail`
  MODIFY `Mail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

ALTER TABLE `manager`
  MODIFY `Ma_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `role`
  MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `student`
  MODIFY `Stu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

ALTER TABLE `topic`
  MODIFY `Topic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`);

ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Con_ID`) REFERENCES `contribution` (`Con_ID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Coor_ID`) REFERENCES `coordinator` (`Coor_ID`);

ALTER TABLE `contribution`
  ADD CONSTRAINT `contribution_ibfk_1` FOREIGN KEY (`Stu_ID`) REFERENCES `student` (`Stu_ID`),
  ADD CONSTRAINT `contribution_ibfk_2` FOREIGN KEY (`Topic_ID`) REFERENCES `topic` (`Topic_ID`);

ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`),
  ADD CONSTRAINT `coordinator_ibfk_2` FOREIGN KEY (`Fa_ID`) REFERENCES `faculty` (`Fa_ID`);

ALTER TABLE `magazine`
  ADD CONSTRAINT `magazine_ibfk_1` FOREIGN KEY (`Con_ID`) REFERENCES `contribution` (`Con_ID`);

ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`Stu_ID`) REFERENCES `student` (`Stu_ID`),
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`Coor_ID`) REFERENCES `coordinator` (`Coor_ID`);

ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`);

ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Fa_ID`) REFERENCES `faculty` (`Fa_ID`);

ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`Fa_ID`) REFERENCES `faculty` (`Fa_ID`);
COMMIT;


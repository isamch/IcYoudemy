-- table users:
CREATE TABLE Users (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role ENUM('student', 'teacher', 'admin') NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE Category (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL
);



-- table courses :
CREATE TABLE Courses (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Description TEXT,
    TeacherID INT NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (TeacherID) REFERENCES Users (Id)
);


-- table Enrollments :
CREATE TABLE Enrollments (
    StudentID INT NOT NULL,
    CourseID INT NOT NULL,
    EnrolledAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (StudentID, CourseID),
    FOREIGN KEY (StudentID) REFERENCES Users (Id),
    FOREIGN KEY (CourseID) REFERENCES Courses (Id)
);


-- tags :
CREATE TABLE Tags (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
);


-- course_tage:
CREATE TABLE CourseTags (
    CourseID INT NOT NULL,
    TagID INT NOT NULL,
    PRIMARY KEY (CourseID, TagID),
    FOREIGN KEY (CourseID) REFERENCES Courses(Id),
    FOREIGN KEY (TagID) REFERENCES Tags(Id)
);




-- update :
ALTER TABLE Users
ADD COLUMN accStatus ENUM('active', 'not active', 'suspend') NOT NULL DEFAULT 'not active';


ALTER TABLE Users
ADD COLUMN connectStatus ENUM('online', 'offline') NOT NULL DEFAULT 'offline';



ALTER TABLE Courses 
ADD COLUMN CategoryID INT NOT NULL;

ALTER TABLE Courses 
ADD FOREIGN KEY (CategoryID) REFERENCES Category(Id);


ALTER TABLE Courses 
ADD COLUMN StatusDisplay ENUM('active', 'not active') NOT NULL DEFAULT 'active';
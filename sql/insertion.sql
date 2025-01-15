INSERT INTO Users (Name, Email, Password, Role, accStatus) VALUES
('Ahmed Ali', 'ahmed.ali@example.com', 'password123', 'student', 'active'),
('Khadija Omar', 'khadija.omar@example.com', 'pass456', 'teacher', 'active'),
('Mohamed Salah', 'mohamed.salah@example.com', 'pass789', 'admin', 'active'),
('Fatima Zahra', 'fatima.zahra@example.com', 'mypassword', 'student', 'active'),
('Youssef Karim', 'youssef.karim@example.com', '123456', 'teacher', 'active'),
('Sara Hicham', 'sara.hicham@example.com', 'sara2024', 'student', 'active'),
('Ali Rami', 'ali.rami@example.com', 'securepass', 'teacher', 'active'),
('Hana Issam', 'hana.issam@example.com', 'hana123', 'student', 'active'),
('Omar Tarek', 'omar.tarek@example.com', 'omar456', 'admin', 'active'),
('Nada Yassir', 'nada.yassir@example.com', 'nada789', 'student', 'active');



INSERT INTO Category (Name) VALUES
('Programming'),
('Mathematics'),
('Science'),
('Languages'),
('Design'),
('Business'),
('Art'),
('History'),
('Technology'),
('Health');



INSERT INTO Courses (Title, Description, TeacherID, CategoryID) VALUES
('C Programming Basics', 'Learn the fundamentals of C programming.', 2, 1),
('Advanced Mathematics', 'Explore advanced math concepts.', 5, 2),
('Physics 101', 'Introduction to Physics.', 5, 3),
('English Grammar', 'Master English grammar rules.', 2, 4),
('Graphic Design Basics', 'Learn the basics of design.', 7, 5),
('Business Strategies', 'Strategies for business success.', 5, 6),
('Painting Techniques', 'Discover modern painting techniques.', 7, 7),
('World History Overview', 'A journey through world history.', 5, 8),
('AI and Machine Learning', 'Introduction to AI concepts.', 2, 9),
('Health and Wellness', 'Tips for a healthy lifestyle.', 5, 10);




INSERT INTO Enrollments (StudentID, CourseID) VALUES
(1, 1),
(1, 2),
(4, 3),
(6, 4),
(8, 5),
(4, 6),
(6, 7),
(4, 8),
(1, 9),
(8, 10);


INSERT INTO Enrollments (StudentID, CourseID) VALUES
(3, 4);




INSERT INTO Tags (Name) VALUES
('Beginner'),
('Intermediate'),
('Advanced'),
('Popular'),
('New'),
('Programming'),
('Mathematics'),
('Science'),
('Technology'),
('Art');



INSERT INTO CourseTags (CourseID, TagID) VALUES
(1, 1),
(1, 6),
(2, 7),
(3, 8),
(4, 1),
(5, 10),
(6, 4),
(7, 10),
(8, 9),
(10, 5),
(9, 2);
SELECT * FROM courses;

SELECT courses.`Id`, courses.`Title`, courses.`Description`, courses.`CreatedAt`, category.`Name`, GROUP_CONCAT(tags.`Name`), users.`Name` AS tags
FROM
    courses
    LEFT JOIN category ON `CategoryID` = category.`Id`
    LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
    LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
    LEFT JOIN users ON users.`Id` = courses.`TeacherID`
GROUP BY
    courses.`Id`
LIMIT 4, 4;

SELECT COUNT(*) as total FROM courses;




-- join enroll courses users:
SELECT courses.`Id`, courses.`Title`, users.`Id`, users.`Name`
FROM
    courses
    INNER JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
    INNER JOIN users ON users.`Id` = enrollments.`StudentID`;









-- courses.`Id`, courses.`Title`, courses.`Description`, courses.`CreatedAt`, category.`Name`, GROUP_CONCAT(tags.`Name`) as tags, users.`Name` AS username
-- select coure with number of enrolling with student name : best 10 courses.
SELECT
    courses.`Id` AS CourseID,
    courses.`Title` AS CourseTitle,
    courses.`Description` AS CourseDescription,
    courses.`CreatedAt` AS CourseDate,
    category.`Name` AS Category,
    GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
    teacher.`Name` AS TeacherName,
    COUNT(DISTINCT students.`Id`) AS StudentCount,
    GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
FROM
    courses
    INNER JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
    INNER JOIN users as students ON students.`Id` = enrollments.`StudentID`
    LEFT JOIN category ON `CategoryID` = category.`Id`
    LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
    LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
    LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
GROUP BY
    courses.`Id`,
    courses.`Title`
ORDER BY 
    StudentCount DESC
LIMIT 0, 10;






-- select pagination display :

SELECT
              courses.`Id` AS CourseID,
              courses.`Title` AS CourseTitle,
              courses.`Description` AS CourseDescription,
              courses.`CreatedAt` AS CourseDate,
              courses.`StatusDisplay` AS StatusDisplay,
              category.`Name` AS Category,
              GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
              teacher.`Name` AS TeacherName,
              COUNT(DISTINCT students.`Id`) AS StudentCount,
              GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
          FROM
              courses
              LEFT JOIN category ON `CategoryID` = category.`Id`
              LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
              LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
              LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
              LEFT JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
              LEFT JOIN users as students ON students.`Id` = enrollments.`StudentID`
          GROUP BY
              courses.`Id`,
              courses.`Title`
          ORDER BY 
              StudentCount DESC;




SELECT * FROM courses;



-- show category:
SELECT * FROM category;


SELECT * FROM tags;





SELECT
                  courses.`Id` AS CourseID,
                  courses.`Title` AS CourseTitle,
                  courses.`Description` AS CourseDescription,
                  courses.`CreatedAt` AS CourseDate,
                  courses.`StatusDisplay` AS StatusDisplay,
                  category.`Name` AS Category,
                  GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
                  teacher.`Name` AS TeacherName,
                  COUNT(DISTINCT students.`Id`) AS StudentCount,
                  GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
              FROM
                  courses
                  INNER JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
                  INNER JOIN users as students ON students.`Id` = enrollments.`StudentID`
                  LEFT JOIN category ON `CategoryID` = category.`Id`
                  LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
                  LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
                  LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
              GROUP BY
                  courses.`Id`,
                  courses.`Title`
                -- WHERE students
                  ;






SELECT 
    courses.`Id` AS CourseID,
    courses.`Title` AS CourseTitle,
    courses.`Description` AS CourseDescription,
    courses.`CreatedAt` AS CourseDate,
    courses.`StatusDisplay` AS StatusDisplay,
    category.`Name` AS Category,
    teacher.`Name` AS TeacherName,
    GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
    students.`Id` AS studentID,
    students.`Name` AS studentName,
    (
        SELECT COUNT(enrollments.`StudentID`)
        FROM enrollments
        WHERE enrollments.`CourseID` = courses.`Id`
    ) AS StudentCount
FROM
    courses
    INNER JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
    INNER JOIN users as students ON students.`Id` = enrollments.`StudentID`

    INNER JOIN category ON `CategoryID` = category.`Id`
    INNER JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
    INNER JOIN tags ON coursetags.`TagID` = tags.`Id`
    INNER JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
WHERE 
    students.`Name` = 'Ahmed Ali'
GROUP BY
    courses.`Id`,
    courses.`Title`;



-- courses.`Id` AS CourseID,
-- courses.`Title` AS CourseTitle,
-- courses.`Description` AS CourseDescription,
-- courses.`CreatedAt` AS CourseDate,
-- courses.`StatusDisplay` AS StatusDisplay,
-- category.`Name` AS Category,
-- GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
-- teacher.`Name` AS TeacherName,
-- COUNT(DISTINCT students.`Id`) AS StudentCount,
-- GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames





-- enroll :

INSERT INTO Enrollments (StudentID, CourseID) VALUES
(3, 4);

-- unenroll :
-- DELETE FROM `enrollments` WHERE StudentID = 3 AND CourseID = 4;




SELECT COUNT(*) as total FROM courses WHERE `TeacherID` = 13;










SELECT
              courses.`Id` AS CourseID,
              courses.`Title` AS CourseTitle,
              courses.`Description` AS CourseDescription,
              courses.`CreatedAt` AS CourseDate,
              courses.`StatusDisplay` AS StatusDisplay,
              category.`Name` AS Category,
              GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
              teacher.`Id` AS TeacherID,
              teacher.`Name` AS TeacherName,
              COUNT(DISTINCT students.`Id`) AS StudentCount,
              GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
          FROM
              courses
              LEFT JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
              LEFT JOIN users as students ON students.`Id` = enrollments.`StudentID`
              LEFT JOIN category ON `CategoryID` = category.`Id`
              LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
              LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
              LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
          WHERE TeacherID = 13
          GROUP BY
              courses.`Id`,
              courses.`Title`
          LIMIT 0, 12;








SELECT * 
FROM courses
WHERE TeacherID = 13;




SELECT * 
FROM users
WHERE role != 'admin'
ORDER BY `CreatedAt` DESC;



-- UPDATE users SET accStatus = 'active' WHERE users.`Id` = 13;



-- SELECT * FROM users WHERE users.Id != 'admin';


SELECT * FROM users;



-- search query :
SELECT
    courses.`Id` AS CourseID,
    courses.`Title` AS CourseTitle,
    courses.`Description` AS CourseDescription,
    courses.`CreatedAt` AS CourseDate,
    courses.`StatusDisplay` AS StatusDisplay,
    category.`Name` AS Category,
    GROUP_CONCAT(tags.`Name`) AS Tags,
    teacher.`Id` AS TeacherID,
    teacher.`Name` AS TeacherName,
    COUNT(DISTINCT students.`Id`) AS StudentCount,
    GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
FROM
    courses
    LEFT JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
    LEFT JOIN users as students ON students.`Id` = enrollments.`StudentID`
    LEFT JOIN category ON `CategoryID` = category.`Id`
    LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
    LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
    LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
WHERE
    courses.`StatusDisplay` = 'active'
GROUP BY
    courses.`Id`,
    courses.`Title`
HAVING
    LOWER(courses.`Title`) LIKE '%C%'
    OR LOWER(courses.`Description`) LIKE '%C%'
    OR LOWER(category.`Name`) LIKE '%C%'
    OR LOWER(teacher.`Name`) LIKE '%C%'
    OR LOWER(GROUP_CONCAT(tags.`Name`)) LIKE '%C%';



SHOW TABLE STATUS FROM youdemy;






SELECT
                  courses.`Id` AS CourseID,
                  courses.`Title` AS CourseTitle,
                  courses.`Description` AS CourseDescription,
                  courses.`CreatedAt` AS CourseDate,
                  courses.`StatusDisplay` AS StatusDisplay,
                  category.`Name` AS Category,
                  GROUP_CONCAT(tags.`Name`) AS Tags,
                  teacher.`Id` AS TeacherID,
                  teacher.`Name` AS TeacherName,
                  COUNT(DISTINCT students.`Id`) AS StudentCount,
                  GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
              FROM
                  courses
                  LEFT JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
                  LEFT JOIN users as students ON students.`Id` = enrollments.`StudentID`
                  LEFT JOIN category ON `CategoryID` = category.`Id`
                  LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
                  LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
                  LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
              WHERE
                  courses.`StatusDisplay` = 'active'
                  and courses.`Id` = 1
              GROUP BY
                  courses.`Id`,
                  courses.`Title`;




-- counte active courses :

SELECT COUNT(courses.`Id`) 
    FROM courses
    WHERE courses.`StatusDisplay` = 'active';
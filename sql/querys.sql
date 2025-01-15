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
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
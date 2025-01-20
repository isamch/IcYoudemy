<?php


    // dump($targetcourse);


    // dump($_SERVER['PHP_SELF']);
    // dump($_SERVER['REQUEST_URI']);

?>
<!-- 
"CourseID" => 1
  "CourseTitle" => "C Programming Basics"
  "CourseDescription" => "Learn the fundamentals of C programming."
  "CourseDate" => "2025-01-14 18:10:04"
  "StatusDisplay" => "active"
  "Category" => "Programming"
  "Tags" => "Beginner,Programming"
  "TeacherID" => 2
  "TeacherName" => "hassan ahmad"
  "StudentCount" => 1
  "StudentNames" => "Ahmed Ali" -->


<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <!-- start course card -->
    <div class="flex flex-col bg-white shadow-lg border border-slate-200 rounded-lg w-3/4 lg:w-1/2 hover:shadow-xl transition-all duration-300 ease-in-out p-6">
        <div class="flex items-start justify-between p-4 border-b border-slate-200">
            <span class="text-lg font-medium text-slate-600"><?php echo $targetcourse['TeacherName']; ?></span>
            <a href="#" class="bg-blue-700 text-white text-sm py-1 px-3 rounded-lg hover:bg-blue-800 transition-all duration-300">Tech</a>
        </div>
        <div class="p-4 flex-1">
            <a>
                <h5 class="mb-4 text-2xl font-bold text-gray-900"><?php echo $targetcourse['CourseTitle']; ?></h5>
            </a>
            <p class="text-gray-700 text-base mb-6">
                <?php echo $targetcourse['CourseDescription']; ?>
            </p>

            <div class="flex flex-wrap gap-2">
                <?php foreach (explode(",", $targetcourse['Tags']) as $tag): ?>
                    <a href="#" class="bg-gray-300 text-black text-sm py-1 px-3 rounded-full hover:bg-gray-400 transition-all"><?php echo $tag ?></a>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="p-4 text-center">

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['Role'] == 'student'): ?>

                <?php if (in_array($_SESSION['user']['Name'], explode(",", $targetcourse['StudentNames']))): ?>

                    <a href="mycourses?unenroll-id=<?php echo $targetcourse['CourseID']; ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-blue-800 transition-all">
                        Unenroll
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                <?php else: ?>
                    <a href="mycourses?enroll-id=<?php echo $targetcourse['CourseID']; ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">
                        Enroll now
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                <?php endif; ?>

            <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['Role'] == 'teacher' || isset($_SESSION['user']) && $_SESSION['user']['Role'] == 'admin'): ?>

                <a class="inline-flex cursor-not-allowed items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">
                    Enroll now
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            <?php else: ?>

                <a href="/Youdemy/public/index.php/register" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">
                    Enroll now
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            <?php endif; ?>

        </div>



        <div class="flex justify-between  border-t border-slate-200 pt-4 px-4">
            <span class="text-sm text-slate-900">
                Created At:
                <span class="text-black font-medium">
                    <?php echo date("F j, Y, g:i a", strtotime($targetcourse['CourseDate'])); ?>
                </span>
                <!-- timestamp : seconds from 1 January 1970 -->
                <!-- date() work only with timstamp -->
            </span>
            <span class="text-sm text-slate-900">
                Enrolled:
                <span class="text-blue-500 font-medium">
                    <?php echo $targetcourse['StudentCount']; ?>
                </span>
            </span>
        </div>


    </div>
    <!-- end course card -->
</div>
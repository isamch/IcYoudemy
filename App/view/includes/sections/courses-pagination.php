<div class="font-[sans-serif] bg-gray-100">
    <div class="p-4 mx-auto lg:max-w-7xl md:max-w-4xl sm:max-w-xl max-sm:max-w-sm">
        <!-- <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-6 sm:mb-10 text-center">Courses</h2> -->
        <nav class="bg-gray-100 flex justify-between items-center w-full p-4">
            <a class="text-lg font-bold">Courses</a>

            <div class="relative w-4/12">
                <input
                    id="search-courses"
                    type="text"
                    placeholder="Search"
                    class="form-control border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300">

                <!-- result: -->
                <div
                    id="results-box"
                    class="absolute mt-1 w-full	bg-white border border-gray-300 rounded-md shadow-lg hidden">

                    <!-- <span class="border-b text-xs text-gray-500 flex justify-center items-center py-2">searching ...</span> -->

                    <ul>
                        <!-- <li class="px-3 py-2 hover:bg-gray-100 border-b cursor-pointer">
                            <a href="course-page?id=">
                                <p class="font-semibold text-sm text-gray-800">Course Title</p>
                                <p class="text-xs text-gray-500">This is a small description of the course.</p>
                            </a>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">



            <!-- start course card -->
            <!-- <div class="flex flex-col bg-white shadow-lg border border-slate-200 rounded-lg h-full hover:shadow-xl transition-all duration-300 ease-in-out">
                <div class="flex items-start justify-between p-4 border-b border-slate-200">
                    <span class="text-sm font-medium text-slate-600">Author name</span>
                    <a href="#" class="bg-blue-700 text-white text-xs py-1 px-3 rounded-lg hover:bg-blue-800 transition-all duration-300">Tech</a>
                </div>
                <div class="p-4 flex-1">
                    <a href="#">
                        <h5 class="mb-2 text-lg font-bold text-gray-900">Noteworthy technology acquisitions 2021</h5>
                    </a>
                    <p class="text-gray-700 text-sm mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="bg-gray-300 text-black text-xs py-1 px-2 rounded-full hover:bg-gray-400 transition-all">Tech</a>
                        <a href="#" class="bg-gray-300 text-black text-xs py-1 px-2 rounded-full hover:bg-gray-400 transition-all">Business</a>
                        <a href="#" class="bg-gray-300 text-black text-xs py-1 px-2 rounded-full hover:bg-gray-400 transition-all">2021</a>
                    </div>
                </div>
                <div class="p-4 text-center">
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">
                        Enroll now
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div class="p-4 border-t border-slate-200">
                    <span class="text-sm text-slate-600">Created At: 4 hours ago</span>
                </div>
            </div> -->
            <!-- end course card -->


            <?php

            // dump($_SESSION['user']);
            // dump($courses);
            // dump($courses[3]);

            ?>


            <?php foreach ($courses as $keycourse => $valuecourses): ?>

                <?php if ($valuecourses['StatusDisplay'] == 'active'): ?>

                    <!-- start course card -->
                    <div class="flex flex-col bg-white shadow-lg border border-slate-200 rounded-lg h-full hover:shadow-xl transition-all duration-300 ease-in-out">
                        <div class="flex items-start justify-between p-4 border-b border-slate-200">
                            <span class="text-sm font-medium text-slate-600"><?php echo $valuecourses['TeacherName']; ?></span>
                            <a href="" class="bg-blue-700 text-white text-xs py-1 px-3 rounded-lg hover:bg-blue-800 transition-all duration-300"><?php echo $valuecourses['Category']; ?></a>
                        </div>

                        <div class="p-4 flex-1">
                            <a href="course-page?page-courseid=<?php echo $valuecourses['CourseID']; ?>">
                                <h5 class="mb-2 text-lg font-bold text-gray-900"><?php echo $valuecourses['CourseTitle']; ?></h5>
                            </a>
                            <p class="text-gray-700 text-sm mb-4">
                                <?php echo $valuecourses['CourseDescription']; ?>
                            </p>

                            <div class="flex flex-wrap gap-2">
                                <?php foreach (explode(",", $valuecourses['Tags']) as $tag): ?>
                                    <a href="#" class="bg-gray-300 text-black text-xs py-1 px-2 rounded-full hover:bg-gray-400 transition-all"><?php echo $tag ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <div class="p-4 text-center">

                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['Role'] == 'student'): ?>

                                <?php if (in_array($_SESSION['user']['Name'], explode(",", $valuecourses['StudentNames']))): ?>

                                    <a href="/Youdemy/public/index.php/courses?unenroll-id=<?php echo $valuecourses['CourseID']; ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-blue-800 transition-all">
                                        Unenroll
                                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                <?php else: ?>
                                    <a href="/Youdemy/public/index.php/courses?enroll-id=<?php echo $valuecourses['CourseID']; ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">
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



                        <div class="flex flex-col justify-between  border-t border-slate-200 py-3 px-4">
                            <span class="text-sm text-slate-900">
                                Created At:
                                <span class="text-black font-medium">
                                    <?php echo date("F j, Y, g:i a", strtotime($valuecourses['CourseDate'])); ?>
                                </span>
                                <!-- timestamp : seconds from 1 January 1970 -->
                                <!-- date() work only with timstamp -->
                            </span>
                            <span class="text-sm text-slate-900">
                                Enrolled:
                                <span class="text-blue-500 font-medium">
                                    <?php echo $valuecourses['StudentCount']; ?>
                                </span>
                            </span>
                        </div>



                    </div>
                    <!-- end course card -->


                <?php endif; ?>
            <?php endforeach; ?>














        </div>






        <!-- pagination -->

        <ul class="flex space-x-5 justify-center font-[sans-serif] m-5">

            <!-- go back -->
            <?php if (isset($_GET['page-nbr']) && $_GET['page-nbr'] > 1): ?>
                <a href="/Youdemy/public/index.php/courses?page-nbr=<?= htmlentities($_GET['page-nbr'] - 1) ?>" class="flex items-center justify-center shrink-0 bg-white  w-9 h-9 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-800" viewBox="0 0 55.753 55.753">
                        <path
                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                            data-original="#000000" />
                    </svg>
                </a>
            <?php else: ?>
                <a class="flex items-center justify-center shrink-0 bg-white  w-9 h-9 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-800" viewBox="0 0 55.753 55.753">
                        <path
                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                            data-original="#000000" />
                    </svg>
                </a>
            <?php endif; ?>


            <?php for ($count = 1; $count <= $totalPages; $count++): ?>
                <!-- numbers -->
                <a href="/Youdemy/public/index.php/courses?page-nbr=<?= htmlentities($count) ?>"
                    class="flex items-center justify-center shrink-0  <?php echo (isset($_GET['page-nbr']) && $_GET['page-nbr'] == $count) ? 'bg-blue-500 text-white' : 'bg-white' ?> border hover:border-blue-500 cursor-pointer text-base font-bold text-gray-800 px-[13px] h-9 rounded-md">
                    <?= htmlentities($count) ?>
                </a>
            <?php endfor; ?>

            <!-- go front -->
            <?php if (isset($_GET['page-nbr']) && $_GET['page-nbr'] >= $totalPages): ?>
                <a class="flex items-center justify-center shrink-0 bg-white border hover:border-blue-500  w-9 h-9 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-800 rotate-180" viewBox="0 0 55.753 55.753">
                        <path
                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                            data-original="#000000" />
                    </svg>
                </a>
            <?php else: ?>
                <a href="/Youdemy/public/index.php/courses?page-nbr=<?= htmlentities(isset($_GET['page-nbr']) ? $_GET['page-nbr'] + 1 : 2) ?>" class="flex items-center justify-center shrink-0 bg-white  border hover:border-blue-500 cursor-pointer w-9 h-9 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-800 rotate-180" viewBox="0 0 55.753 55.753">
                        <path
                            d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                            data-original="#000000" />
                    </svg>
                </a>
            <?php endif; ?>





        </ul>

    </div>

</div>

<!-- js for search on courses -->
<script>
    const searchInput = document.querySelector('#search-courses');

    const resultsBox = document.getElementById('results-box');


    search();

    function search() {




        // console.log(searchInput);

        searchInput.addEventListener("keyup", (event) => {

            if (event.ctrlKey || event.altKey || event.metaKey) {
                return;
            }

            let inputvalue = searchInput.value;

            if (inputvalue.trim() !== '') {
                resultsBox.classList.remove('hidden');
                sendUpdatesToPhp(inputvalue);


            } else {
                resultsBox.classList.add('hidden');

            }





        });





    }



    function sendUpdatesToPhp(inputvalue) {
        fetch('search', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    inputvalue: inputvalue
                })
            })
            .then((response) => response.json())
            .then((data) => {

                // call fun to append child:
                // console.log(data);
                displayresult(data);

            })
            .catch((error) => {
                console.error('Fetch Error:', error);
            });

    }


    function displayresult(result) {

        const resultsBoxUl = resultsBox.querySelector('ul');
        // console.log(resultsBoxUl);

        resultsBoxUl.innerHTML = '';

        // console.log(typeof result);
        // console.log(result.length);

        if (result.length >= 1) {

            result.forEach(element => {

                resultsBoxUl.innerHTML += `
                    <li class="px-3 py-2 hover:bg-gray-100 border-b cursor-pointer"> 
                        <a href="course-page?page-courseid=${element['CourseID']}">
                            <p class="font-semibold text-sm text-gray-800">${element['CourseTitle']}</p>
                            <p class="text-xs text-gray-500">${element['CourseDescription']}</p>
                        </a>
                    </li>
                        
                `;

            });

        }else{

            resultsBoxUl.innerHTML += `
                <span class="border-b text-xs text-gray-900 flex justify-center items-center py-2">Not Found !</span>        
            `;
        }



    }


</script>
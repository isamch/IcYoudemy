<div class="font-[sans-serif] bg-gray-100">
    <div class="p-4 mx-auto lg:max-w-7xl md:max-w-4xl sm:max-w-xl max-sm:max-w-sm">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-6 sm:mb-10 text-center">Courses</h2>



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
              // dump($mycourses[1]);
              

            ?>
    
            <?php foreach ($mycourses as $keymycourse => $valuemycourses): ?> 
                
                <?php if($valuemycourses['StatusDisplay'] == 'active'): ?>

                    <!-- start course card -->
                    <div class="flex flex-col bg-white shadow-lg border border-slate-200 rounded-lg h-full hover:shadow-xl transition-all duration-300 ease-in-out">
                        <div class="flex items-start justify-between p-4 border-b border-slate-200">
                            <span class="text-sm font-medium text-slate-600"><?php echo $valuemycourses['TeacherName']; ?></span>
                            <a href="#" class="bg-blue-700 text-white text-xs py-1 px-3 rounded-lg hover:bg-blue-800 transition-all duration-300"><?php echo $valuemycourses['Category']; ?></a>
                        </div>

                        <div class="p-4 flex-1">
                            <a href="course-page?page-courseid=<?php echo $valuemycourses['CourseID']; ?>">
                                <h5 class="mb-2 text-lg font-bold text-gray-900"><?php echo $valuemycourses['CourseTitle']; ?></h5>
                            </a>
                            <p class="text-gray-700 text-sm mb-4">
                                <?php echo $valuemycourses['CourseDescription']; ?>
                            </p>

                            <div class="flex flex-wrap gap-2">
                                <?php foreach (explode(",", $valuemycourses['Tags']) as $tag): ?>
                                    <a href="" class="bg-gray-300 text-black text-xs py-1 px-2 rounded-full hover:bg-gray-400 transition-all"><?php echo $tag ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <div class="p-4 text-center">
                            <a href="mycourses?unenroll-id=<?php echo $valuemycourses['CourseID'] ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-blue-800 transition-all">
                                Unenroll
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>

                        <div class="flex flex-col justify-between  border-t border-slate-200 py-3 px-4">
                            <span class="text-sm text-slate-900">
                                Created At:
                                <span class="text-black font-medium">
                                    <?php echo date("F j, Y, g:i a", strtotime($valuemycourses['CourseDate'])); ?>
                                </span>
                                <!-- timestamp : seconds from 1 January 1970 -->
                                <!-- date() work only with timstamp -->
                            </span>
                            <span class="text-sm text-slate-900">
                                Enrolled:
                                <span class="text-blue-500 font-medium">
                                    <?php echo $valuemycourses['StudentCount']; ?>
                                </span>
                            </span>
                        </div>



                    </div>
                    <!-- end course card -->


                <?php endif; ?>
            <?php endforeach; ?>














        </div>


    </div>

</div>
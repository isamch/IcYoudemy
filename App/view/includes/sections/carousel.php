<hr>
<div class="bg-white">




	<div class=" mx-auto max-w-2xl px-4 py-6 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

		<h2 class="mx-auto max-w-screen-sm text-center mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Best 10 Courses</h2>
		<!-- 

		<div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
			<button type="button" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">All courses</button>
			<button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Dev</button>
			<button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Sports</button>
			<button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Social</button>
			<button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Marketing</button>
		</div> -->


		<!-- Flowbite Carousel Container -->
		<div id="carousel" class="relative mt-4">
			<div class="overflow-x-auto" style="scrollbar-width: thin; scrollbar-color: #a1a1aa #e5e5e5;">
				<div class="carousel-items flex space-x-4 px-4" style="width: max-content;">



					<?php foreach ($topcourses as $topcoursekey => $topcoursevalue):?>

						<?php if($topcoursevalue['StatusDisplay'] == 'active'): ?>

							<!-- Start card course -->
							<div class="relative mb-5 flex flex-col justify-between bg-white shadow-lg border border-slate-200 rounded-lg max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg w-full hover:shadow-xl transition-all duration-300 ease-in-out">

								<div class="flex items-center justify-between border-b border-slate-200 py-4 px-4">
									<span class="text-sm font-medium text-slate-600"><?php echo $topcoursevalue['TeacherName']; ?></span>
									<a href="#" class="bg-blue-700 text-white text-xs py-2 px-4 rounded-lg hover:bg-blue-800 transition-all duration-300"><?php echo $topcoursevalue['Category']; ?></a>
								</div>

								<div class="p-4 flex flex-col">
									<a href="#">
										<h5 class="mb-2 text-xl font-bold text-gray-900"><?php echo $topcoursevalue['CourseTitle']; ?></h5>
									</a>
									<p class="text-gray-700 text-sm mb-4">
										<?php echo $topcoursevalue['CourseDescription']; ?>
									</p>
									<div class="flex flex-wrap gap-2">
										<?php foreach (explode(",", $topcoursevalue['Tags']) as $tag): ?>
											<a href="#" class="bg-gray-300 text-black text-xs py-1 px-3 rounded-full hover:bg-gray-400 transition-all duration-300"><?php echo $tag ?></a>
										<?php endforeach; ?>
									</div>
								</div>

								<a href="#" class="mx-auto mb-4 px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all duration-300 w-fit">
									Enroll now
									<svg class="w-3.5 h-3.5 inline ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
									</svg>
								</a>

								<div class="flex flex-col justify-between  border-t border-slate-200 py-3 px-4">
									<span class="text-sm text-slate-900">
										Created At:
										<span class="text-black font-medium">
											<?php echo date("F j, Y, g:i a", strtotime($topcoursevalue['CourseDate'])); ?>
										</span>
									</span>
									<span class="text-sm text-slate-900">
										Enrolled: 
										<span class="text-blue-500 font-medium">
											<?php echo $topcoursevalue['StudentCount']; ?>
										</span>
									</span>
								</div>
							</div>
							<!-- End card course -->

						<?php endif; ?>
					<?php endforeach; ?>






















				</div>
			</div>
		</div>





	</div>
</div>
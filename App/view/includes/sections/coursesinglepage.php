
<?php 

    // dump($courses);

?>


<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <!-- start course card -->
    <div class="flex flex-col bg-white shadow-lg border border-slate-200 rounded-lg w-3/4 lg:w-1/2 hover:shadow-xl transition-all duration-300 ease-in-out p-6">
        <div class="flex items-start justify-between p-4 border-b border-slate-200">
            <span class="text-lg font-medium text-slate-600">Author name</span>
            <a href="#" class="bg-blue-700 text-white text-sm py-1 px-3 rounded-lg hover:bg-blue-800 transition-all duration-300">Tech</a>
        </div>
        <div class="p-4 flex-1">
            <a href="#">
                <h5 class="mb-4 text-2xl font-bold text-gray-900">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="text-gray-700 text-base mb-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque.
            </p>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="bg-gray-300 text-black text-sm py-1 px-3 rounded-full hover:bg-gray-400 transition-all">Tech</a>
                <a href="#" class="bg-gray-300 text-black text-sm py-1 px-3 rounded-full hover:bg-gray-400 transition-all">Business</a>
                <a href="#" class="bg-gray-300 text-black text-sm py-1 px-3 rounded-full hover:bg-gray-400 transition-all">2021</a>
            </div>
        </div>
        <div class="p-4 text-center">
            <a href="#" class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">
                Enroll now
                <svg class="w-5 h-5 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
        <div class="p-4 border-t border-slate-200">
            <span class="text-sm text-slate-600">Created At: 4 hours ago</span>
        </div>
    </div>
    <!-- end course card -->
</div>

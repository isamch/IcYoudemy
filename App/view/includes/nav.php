

<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/Youdemy/public/index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/Youdemy/public/assets/images/logo/Youdemy-48.png" class="h-8" alt="Flowbite Logo" />

            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Youdemy</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        
            <?php if(!isset($_SESSION['user'])): ?>
                <a href="/Youdemy/public/index.php/register" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-1">Get started</a>
            <?php endif; ?>

            <?php if(isset($_SESSION['user'])): ?>
                <a href="/Youdemy/public/index.php/logout" class="flex items-center space-x-3 bg-red-800 text-white py-2 px-5 rounded-lg hover:bg-gray-700 focus:outline-none transition-all duration-300">
                    <span class="font-medium">Logout</span>
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            <?php endif; ?>

            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">


                <?php if ($title == "Youdemy | Welcome" || $title == "Youdemy | Home"): ?>
                    <li>
                        <a href="/Youdemy/public/index.php/home" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/Youdemy/public/index.php/home" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                <?php endif; ?>

                <?php if ($title == "Youdemy | Courses"): ?>
                    <li>
                        <a href="/Youdemy/public/index.php/courses" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Courses</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/Youdemy/public/index.php/courses" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Courses</a>
                    </li>
                <?php endif; ?>

                <?php if ($title == "Youdemy | About"): ?>
                    <li>
                        <a href="/Youdemy/public/index.php/about" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">About</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/Youdemy/public/index.php/about" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                <?php endif; ?>

                <?php if ($title == "Youdemy | Dashboard"): ?>
                    <li>
                        <a href="/Youdemy/public/index.php/dashboard" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Dashboard</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/Youdemy/public/index.php/dashboard" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Dashboard</a>
                    </li>
                <?php endif; ?>




            </ul>
        </div>
    </div>
    <hr>
</nav>
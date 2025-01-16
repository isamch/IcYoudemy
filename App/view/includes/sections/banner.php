<div class="relative flex-1 bg-blue-600 px-5 py-24 lg:px-8">
  <div class="mx-auto max-w-3xl text-center">
    <h2 class="text-center text-4xl font-bold leading-tight text-white md:text-5xl">Automate customer support in under
      2 weeks</h2>
    <div class="mt-10 flex flex-col items-center justify-center space-y-5 sm:flex-row sm:gap-x-6 sm:space-y-0">
      
      <a href="<?php echo isset($_SESSION['user']) ? "/Youdemy/public/index.php/courses" : "/Youdemy/public/index.php/login"; ?>" , rel="nofollow noreferrer"
        class="w-full rounded-3xl border border-gray-900 bg-gray-900 px-7 py-3 text-center text-base font-bold text-white transition-colors duration-150 ease-in-out hover:border-gray-800 hover:bg-gray-800 sm:w-auto sm:border-2">
        <?php echo isset($_SESSION['user']) ? "New Courses" : "Login"; ?>
      </a>

      <?php if(isset($_SESSION['user']) && $_SESSION['user']['Role'] == 'teacher' || isset($_SESSION['user']) && $_SESSION['user']['Role'] == 'admin'): ?>
    
      <?php else: ?>
      
        <a  class="relative inline-flex w-full items-center justify-center rounded-3xl border border-white px-7 py-3 sm:w-auto sm:border-2"
        href="<?php echo isset($_SESSION['user']) ? "/Youdemy/public/index.php/mycourses" : "/Youdemy/public/index.php/register"; ?>">
        
          <p class="text-base font-bold text-white">
            <?php echo isset($_SESSION['user']) ? "My Courses" : "Register"; ?>
          </p>
          <span class="absolute inset-0 z-0 overflow-hidden rounded-3xl opacity-0 transition-colors duration-150 ease-in-out hover:bg-[#f5f7fc] hover:opacity-5"></span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php include_once __DIR__ . '/includes/header.php' ?>



<div class="bg-gray-50 font-[sans-serif]">
  <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
    <div class="max-w-md w-full">


      <div class="p-8 rounded-2xl bg-white shadow">
        <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
        <form class="mt-8 space-y-4" method="POST">

          <div>
            <label class="text-gray-800 text-sm mb-2 block">Email</label>
            <div class="relative flex items-center">
              <input name="email" type="email" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter email" title="Enter a valid email address (e.g., example@domain.com)" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
              </svg>
            </div>
          </div>

          <div>
            <label class="text-gray-800 text-sm mb-2 block">Password</label>
            <div class="relative flex items-center">
              <input name="password" type="password" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter password" title="Password must be at least 8 characters long" pattern=".{8,}" required />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
              </svg>
            </div>
          </div>

          <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center">
              <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
              <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                Remember me
              </label>
            </div>
            <div class="text-sm">
              <a href="#" class="text-blue-600 hover:underline font-semibold">
                Forgot your password?
              </a>
            </div>
          </div>

          <div class="!mt-8">
            <button type="submit" name="login" class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
              Sign in
            </button>
          </div>
          <p class="text-gray-800 text-sm !mt-8 text-center">Don't have an account? <a href="/Youdemy/public/index.php/register" class="text-blue-600 hover:underline ml-1 whitespace-nowrap font-semibold">Register here</a></p>
        </form>
      </div>
    </div>
  </div>
</div>



<?php if (isset($_SESSION['error']) || isset($_SESSION['account'])): ?>


  <!-- errors -->
  <div id="overlay" class="fixed inset-0 bg-black opacity-10 z-40"></div>

  <div id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">

      <?php if (isset($_SESSION['error'])): ?>
        <!-- danger message -->
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">
            <?php echo $_SESSION['error']; ?>
          </span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg id="Close-modal" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <title>Close</title>
              <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
          </span>
        </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['account'])): ?>
        <!-- account message -->
        <div class="bg-yellow-100 border border-red-400 text-black px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Account!</strong>
          <span class="block sm:inline">
            <?php echo $_SESSION['account']; ?>
          </span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg id="Close-modal" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <title>Close</title>
              <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
          </span>
        </div>
      <?php endif; ?>



    </div>
  </div>

  <script>
    const modal = document.querySelector('#popup-modal');
    const overlay = document.querySelector('#overlay');

    console.log(overlay);
    setTimeout(function() {
      modal.classList.add('hidden');
      overlay.classList.add('hidden');

    }, 3000);

    const closeButtons = document.querySelectorAll('#Close-modal');

    closeButtons.forEach(button => {
      button.addEventListener('click', function() {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
      });
    });
  </script>



  <?php unset($_SESSION['error']); ?>
  <?php unset($_SESSION['account']); ?>

<?php endif ?>




<?php include_once __DIR__ . '/includes/footer.php' ?>
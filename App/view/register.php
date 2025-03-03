<?php include_once __DIR__ . '/includes/header.php' ?>



<div class="font-[sans-serif] bg-white max-w-4xl flex items-center mx-auto md:h-screen p-4">
  <div class="grid md:grid-cols-3 items-center shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-xl overflow-hidden">


    <div class="max-md:order-1 flex flex-col justify-center md:space-y-16 space-y-8 max-md:mt-16 min-h-full bg-gradient-to-r from-gray-900 to-gray-700 lg:px-8 px-4 py-4">
      <div>
        <h4 class="text-white text-lg">Create Your Account</h4>
        <p class="text-[13px] text-gray-300 mt-3 leading-relaxed">Welcome to our registration page! Get started by creating your account.</p>
      </div>
      <div>
        <h4 class="text-white text-lg">Simple & Secure Registration</h4>
        <p class="text-[13px] text-gray-300 mt-3 leading-relaxed">Our registration process is designed to be straightforward and secure. We prioritize your privacy and data security.</p>
      </div>
    </div>

    <form class="md:col-span-2 w-full py-6 px-6 sm:px-16 max-md:max-w-xl mx-auto" method="POST">
      <div class="mb-6">
        <h3 class="text-gray-800 text-xl font-bold">Create an account</h3>
      </div>

      <div class="space-y-6">

        <div>
          <label class="text-gray-600 text-sm mb-2 block">Full Name</label>
          <div class="relative flex items-center">
            <input name="full-name" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm pl-4 pr-8 py-2.5 rounded-md outline-blue-500" placeholder="Enter name" title="Enter your full name (e.g., John Doe)" pattern="^[A-Za-z]+\s[A-Za-z]+$" required />
            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
              <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
              <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
            </svg>
          </div>
        </div>

        <div>
          <label class="text-gray-600 text-sm mb-2 block">Email</label>
          <div class="relative flex items-center">
            <input name="email" type="email" class="text-gray-800 bg-white border border-gray-300 w-full text-sm pl-4 pr-8 py-2.5 rounded-md outline-blue-500" placeholder="Enter email" title="Enter a valid email address (e.g., example@domain.com)" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required />
            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 682.667 682.667">
              <defs>
                <clipPath id="a" clipPathUnits="userSpaceOnUse">
                  <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                </clipPath>
              </defs>
              <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                <path fill="none" stroke-miterlimit="10" stroke-width="40" d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z" data-original="#000000"></path>
                <path d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z" data-original="#000000"></path>
              </g>
            </svg>
          </div>
        </div>

        <div>
          <label class="text-gray-600 text-sm mb-2 block">Password</label>
          <div class="relative flex items-center">
            <input name="password" type="password" required class="text-gray-800 bg-white border border-gray-300 w-full text-sm pl-4 pr-8 py-2.5 rounded-md outline-blue-500" placeholder="Enter password" title="Password must be at least 8 characters long" pattern=".{8,}" required />
            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
              <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
            </svg>
          </div>
        </div>


        <div>
          <label for="role" class="text-gray-600 text-sm mb-2 block">Select Role</label>
          <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option selected value="student">student</option>
            <option value="teacher">teacher</option>
          </select>
        </div>

      </div>

      <div class="mt-8">
        <button type="submit" name="register" class="w-full py-2.5 px-4 tracking-wider text-sm rounded-md text-white bg-gray-700 hover:bg-gray-800 focus:outline-none">
          Create an account
        </button>
      </div>
      <p class="text-gray-600 text-sm mt-6 text-center">Already have an account? <a href="/Youdemy/public/index.php/login" class="text-blue-600 font-semibold hover:underline ml-1">Login here</a></p>
    </form>
  </div>
</div>


<?php if (isset($_SESSION['error'])): ?>



  <!-- errors -->
  <div id="overlay" class="fixed inset-0 bg-black opacity-10 z-40"></div>

  <div id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">

      <!-- danger message -->
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?php echo $_SESSION['error'] ?></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg id="Close-modal" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
          </svg>
        </span>
      </div>



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

<?php endif ?>



<?php include_once __DIR__ . '/includes/footer.php' ?>
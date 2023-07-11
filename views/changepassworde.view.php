<?php require('partials/header.php')?>
<?php require('partials/nav1.php')?>

<?php require('partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
     <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<?php if($msg!=''): ?>
    
  
    <section class="">
      <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="p-6 border-l-4 border-red-500 rounded-r-xl bg-red-50">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="w-5 h-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div class="ml-3">
              <div class="text-sm text-red-600">
                <p> <?=$msg?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php if($msg1!=''): ?>
    

    <section class="">
      <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="p-6 border-l-4 border-green-500 -6 rounded-r-xl bg-green-50">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div class="ml-3">
              <div class="text-sm text-green-600">
                <p><?=$msg1?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php endif; ?>

   
<form method="POST" action="changepassworde.php">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
          <div class="mt-2">
            <input type="password" name="opassword"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <br>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
          <div class="mt-2">
            <input type="password" name="npassword" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <br>
        <div class="sm:col-span-3">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Confirm New Password</label>
          <div class="mt-2">
            <input type="password"  name="cnpassword"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div></div>
        <br>
        <div class="mt-6 flex items-center  gap-x-6">
    
    <input type="submit" name="submit" value="Submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
  </div>
</form>

    </div>
  </main>    
  <?php require('partials/footer.php')?>
<?php require base_path('views/partials/header.php')?>

<?php require base_path('views/partials/nav3.php')?>
<?php require base_path('views/partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
  

<form  method="POST" action="/admin/changepassword">
    <input type="hidden" name="_method" value="PATCH">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    <?php if(isset($errors['opassword'])): ?>
              <p class="text-red-500 text-xs mt-2"><?= $errors['opassword'] ?></p>
              <?php endif; ?>

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
          <div class="mt-2">
            <input type="text" name="opassword"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <br>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
          <div class="mt-2">
            <input type="text" name="npassword" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <br>
        <div class="sm:col-span-3">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Confirm New Password</label>
          <div class="mt-2">
            <input type="text"  name="cnpassword"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div></div>
        <br>
        <div class="mt-6 flex items-center  gap-x-6">
    
        <button type="submit" id="update" name="update"  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
  </div>
</form>

    </div>
  </main>    
  <?php require base_path('views/partials/footer.php');?>
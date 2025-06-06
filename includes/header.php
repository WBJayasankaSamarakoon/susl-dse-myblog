<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog Header</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
  <header class="bg-white shadow w-full">
    <nav class="w-full px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="#" class="flex items-center">
          <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Blog Logo" />
          <span class="ml-2 font-bold text-indigo-600 text-lg">MyBlog</span>
        </a>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden lg:flex items-center gap-8">
        <a href="#" class="text-gray-700 hover:text-indigo-700">Home</a>
        <a href="#" class="text-gray-700 hover:text-indigo-700">Blogs</a>
        <a href="#" class="text-gray-700 hover:text-indigo-700">About</a>
        <a href="#" class="text-gray-700 hover:text-indigo-700">Contact</a>
      </div>

      <!-- Action Buttons -->
      <div class="hidden lg:flex items-center space-x-4">
        <a href="post_form.php" class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Post Your Blog</a>
      </div>

      <!-- Mobile menu button -->
      <div class="lg:hidden">
        <button id="mobile-menu-button" class="text-gray-600 focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </nav>
  </header>
</body>
</html>

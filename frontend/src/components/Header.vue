<template>
    <nav class="bg-gray-100 p-4">
      <div class="container mx-auto">
        <div class="flex justify-between items-center">
          <a href="/" class="text-xl font-bold text-gray-800">Logo</a>
          <div class="space-x-4">
            <RouterLink to="/" class="text-gray-600 hover:text-gray-900">Home</RouterLink>
            <RouterLink to="/books" class="text-gray-600 hover:text-gray-900">Books</RouterLink>
            <RouterLink to="/authors" class="text-gray-600 hover:text-gray-900">Authors</RouterLink>
            <RouterLink to="/publishers" class="text-gray-600 hover:text-gray-900">Publishers</RouterLink>

          </div>
        </div>
      </div>
    </nav>
    <RouterView/>
  </template>

  <script>
  export default {
    name: "Header"
  }
</script>
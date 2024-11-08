<template>
    <nav class="bg-gray-100 p-4">
      <div class="container mx-auto">
        <div class="flex justify-between items-center">
          <a href="/" class="text-xl font-bold text-gray-800">Logo</a>
          <div class="space-x-4">
            <RouterLink to="/admin/dashboard" class="text-gray-600 hover:text-gray-900">DashboardView</RouterLink>
          </div>
        </div>
      </div>
    </nav>
  </template>

  <script>
  export default {
    name: "Header"
  }
</script>
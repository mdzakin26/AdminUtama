<template>
  <div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
      <div class="p-4 text-lg font-bold border-b">Menu</div>
      <nav class="p-4 space-y-2">
        <Link href="/dashboard" class="block px-3 py-2 rounded hover:bg-gray-200">Dashboard</Link>
        <Link href="/users" class="block px-3 py-2 rounded hover:bg-gray-200">Users</Link>
        <Link href="/settings" class="block px-3 py-2 rounded hover:bg-gray-200">Settings</Link>
      </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script> --> -->

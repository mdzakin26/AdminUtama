<script setup>
import { ref, onMounted, watch } from 'vue'
import SidebarLink from '@/Layouts/SidebarLink.vue'
import { 
  ChevronLeft, ChevronRight, Home, Package, Tag, FileText, 
  Calendar, BarChart, Bell, Settings, Sun, Moon 
} from 'lucide-vue-next'

const isDark = ref(false)
const isCollapsed = ref(false)

onMounted(() => {
  const savedTheme = localStorage.getItem('theme')
  if (savedTheme) {
    isDark.value = savedTheme === 'dark'
  } else {
    isDark.value = window.matchMedia('(prefers-color-scheme: dark)').matches
  }
  document.documentElement.classList.toggle('dark', isDark.value)
})

const toggleDark = () => {
  isDark.value = !isDark.value
  document.documentElement.classList.toggle('dark', isDark.value)
  localStorage.setItem('theme', isDark.value ? 'dark' : 'light')
}

const toggleSidebar = () => {
  isCollapsed.value = !isCollapsed.value
}
</script>

<template>
  <div class="h-screen flex">
    <!-- Sidebar -->
    <aside
      :class="[
        'fixed top-0 left-0 h-full bg-white dark:bg-gray-900 border-r dark:border-gray-800 transition-all duration-300 flex flex-col overflow-hidden z-40',
        isCollapsed ? 'w-20' : 'w-64'
      ]"
    >
      <!-- Header -->
      <div class="flex items-center justify-between p-4 border-b dark:border-gray-800">
        <span v-if="!isCollapsed" class="font-bold text-lg">Utama</span>
        <button @click="toggleSidebar" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
          <ChevronLeft v-if="!isCollapsed" class="w-5 h-5" />
          <ChevronRight v-else class="w-5 h-5" />
        </button>
      </div>

      <!-- Menu -->
      <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <SidebarLink :icon="Home" label="Dashboard" href="/dashboard" :collapsed="isCollapsed" />
        <SidebarLink :icon="Package" label="Barang" href="/barang" :collapsed="isCollapsed" />
        <SidebarLink :icon="Tag" label="Jenis Barang" href="/jenis-barang" :collapsed="isCollapsed" />
        <SidebarLink :icon="FileText" label="Posts" href="/posts" :collapsed="isCollapsed" />
        <SidebarLink :icon="Calendar" label="Schedules" href="/schedules" :collapsed="isCollapsed" />
        <SidebarLink :icon="BarChart" label="Income" href="/income" :collapsed="isCollapsed" />
      </nav>

      <!-- Footer -->
      <div class="border-t p-4 space-y-2 dark:border-gray-800">
        <SidebarLink :icon="Bell" label="Notification" href="/notification" :collapsed="isCollapsed" />
        <SidebarLink :icon="Settings" label="Settings" href="/settings" :collapsed="isCollapsed" />
        <button
          @click="toggleDark"
          class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800 w-full"
        >
          <component :is="isDark ? Sun : Moon" class="w-5 h-5" />
          <span v-if="!isCollapsed">{{ isDark ? 'Light Mode' : 'Dark Mode' }}</span>
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main
      :class="[
        'flex-1 bg-gray-50 dark:bg-gray-800 overflow-auto transition-all duration-300',
        isCollapsed ? 'ml-20' : 'ml-64'
      ]"
    >
      <div class="p-6">
        <slot />
      </div>
    </main>
  </div>
</template>

<style>
::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-thumb {
  background-color: rgba(107, 114, 128, 0.5);
  border-radius: 9999px;
}
</style>

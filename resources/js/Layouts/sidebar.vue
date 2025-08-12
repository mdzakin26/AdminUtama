<script setup>
import SidebarLink from '@/Layouts/SidebarLink.vue';
import { Home, Box, Package, FileText, Calendar, DollarSign, Bell, Settings, Moon } from 'lucide-vue-next';
</script>

<template>
  <aside class="w-64 bg-white h-screen border-r p-4">
    <h2 class="text-lg font-bold mb-4">Utama</h2>
    
    <SidebarLink :icon="Home" label="Dashboard" href="/dashboard" />
    <SidebarLink :icon="Box" label="Barang" href="/barang" />
    <SidebarLink :icon="Package" label="Jenis Barang" href="/jenis-barang" />
    <SidebarLink :icon="FileText" label="Posts" href="/posts" />
    <SidebarLink :icon="Calendar" label="Schedules" href="/schedules" />
    <SidebarLink :icon="DollarSign" label="Income" href="/income" />

    <div class="mt-6 border-t pt-4">
      <SidebarLink :icon="Bell" label="Notification" href="/notifications" />
      <SidebarLink :icon="Settings" label="Settings" href="/settings" />
      <SidebarLink :icon="Moon" label="Dark Mode" href="#" />
    </div>
  </aside>
</template>

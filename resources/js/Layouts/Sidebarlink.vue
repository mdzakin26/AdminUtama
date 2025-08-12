<script setup>
const props = defineProps({
  icon: {
    type: [Object, Function],
    required: true
  },
  label: {
    type: String,
    required: true
  },
  href: {
    type: String,
    required: true
  }
});
</script>

<template>
  <a :href="href" class="flex items-center gap-3 p-2 rounded-md hover:bg-gray-100 transition">
    <component :is="icon" class="w-5 h-5 text-gray-600" />
    <span class="text-gray-800">{{ label }}</span>
  </a>
</template>
s
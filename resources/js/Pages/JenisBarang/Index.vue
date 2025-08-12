<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { defineOptions, ref } from 'vue'
import { router } from '@inertiajs/vue3'

defineOptions({
  layout: AppLayout
})

// Props dari Laravel Controller
const props = defineProps({
  jenisBarang: Array
})

// Form tambah
const form = ref({ nama: '' })

// Form edit
const editForm = ref({ id: null, nama: '' })

// Tambah data
const submit = () => {
  router.post(route('jenis-barang.store'), form.value, {
    onSuccess: () => {
      form.value.nama = ''
    }
  })
}

// Mulai edit
const startEdit = (jb) => {
  editForm.value.id = jb.id
  editForm.value.nama = jb.nama
}

// Update data
const update = () => {
  router.put(route('jenis-barang.update', editForm.value.id), { nama: editForm.value.nama }, {
    onSuccess: () => {
      editForm.value.id = null
      editForm.value.nama = ''
    }
  })
}

// Hapus data
const destroy = (id) => {
  if (confirm('Yakin ingin menghapus?')) {
    router.delete(route('jenis-barang.destroy', id))
  }
}
</script>

<template>
  <div class="p-6">
    <h1 class="text-xl font-bold mb-4">Manajemen Jenis Barang</h1>

    <!-- Form Tambah -->
    <div class="mb-6">
      <input v-model="form.nama" type="text" placeholder="Nama jenis barang"
             class="border rounded px-3 py-2 mr-2" />
      <button @click="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
    </div>

    <!-- Form Edit -->
    <div v-if="editForm.id" class="mb-6">
      <input v-model="editForm.nama" type="text" placeholder="Edit jenis barang"
             class="border rounded px-3 py-2 mr-2" />
      <button @click="update" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
      <button @click="editForm.id = null" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
    </div>

    <!-- Tabel Data -->
    <table class="w-full border">
      <thead>
        <tr class="bg-gray-200">
          <th class="border px-4 py-2">ID</th>
          <th class="border px-4 py-2">Nama</th>
          <th class="border px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="jb in jenisBarang" :key="jb.id">
          <td class="border px-4 py-2">{{ jb.id }}</td>
          <td class="border px-4 py-2">{{ jb.nama }}</td>
          <td class="border px-4 py-2 space-x-2">
            <button @click="startEdit(jb)" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
            <button @click="destroy(jb.id)" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

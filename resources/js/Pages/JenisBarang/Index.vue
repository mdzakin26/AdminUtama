<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { defineOptions, ref } from 'vue'
import { router } from '@inertiajs/vue3'

defineOptions({
  layout: AppLayout
})

const props = defineProps({
  jenisBarang: Array
})

const form = ref({ nama: '' })
const editForm = ref({ id: null, nama: '' })

const submit = () => {
  router.post(route('jenis-barang.store'), form.value, {
    onSuccess: () => {
      form.value.nama = ''
    }
  })
}

const startEdit = (jb) => {
  editForm.value.id = jb.id
  editForm.value.nama = jb.nama
}

const update = () => {
  router.put(route('jenis-barang.update', editForm.value.id), { nama: editForm.value.nama }, {
    onSuccess: () => {
      editForm.value.id = null
      editForm.value.nama = ''
    }
  })
}

const destroy = (id) => {
  if (confirm('Yakin ingin menghapus?')) {
    router.delete(route('jenis-barang.destroy', id))
  }
}
</script>

<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Jenis Barang</h1>

    <!-- Form Tambah -->
    <form @submit.prevent="submit" v-if="!editForm.id" class="mb-6 flex gap-2">
      <input v-model="form.nama" type="text" placeholder="Nama Jenis Barang" class="border rounded px-2 py-1 flex-1" />
      <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Tambah</button>
    </form>

    <!-- Form Edit -->
    <form @submit.prevent="update" v-else class="mb-6 flex gap-2">
      <input v-model="editForm.nama" type="text" placeholder="Nama Jenis Barang" class="border rounded px-2 py-1 flex-1" />
      <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded">Update</button>
      <button type="button" @click="editForm.id = null" class="bg-gray-500 text-white px-4 py-1 rounded">Batal</button>
    </form>

    <!-- Tabel -->
    <table class="w-full border">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2 border">ID</th>
          <th class="p-2 border">Nama</th>
          <th class="p-2 border">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="jb in jenisBarang" :key="jb.id">
          <td class="p-2 border">{{ jb.id }}</td>
          <td class="p-2 border">{{ jb.nama }}</td>
          <td class="p-2 border text-center space-x-2">
            <button @click="startEdit(jb)" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
            <button @click="destroy(jb.id)" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

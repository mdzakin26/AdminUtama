<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  jenis: Array
});

const form = useForm({
  nama: '',
  jenis_barang_id: '',
  stok: 0,
  harga: 0
});

function submit() {
  form.post(route('barang.store'));
}
</script>

<template>
  <div class="max-w-lg mx-auto bg-white p-4 rounded shadow dark:bg-gray-800">
    <h1 class="text-xl font-bold mb-4 dark:text-white">Tambah Barang</h1>
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block mb-1 dark:text-gray-300">Nama Barang</label>
        <input v-model="form.nama" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" />
      </div>

      <div>
        <label class="block mb-1 dark:text-gray-300">Jenis Barang</label>
        <select v-model="form.jenis_barang_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
          <option value="">-- Pilih Jenis --</option>
          <option v-for="j in props.jenis" :key="j.id" :value="j.id">{{ j.nama }}</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 dark:text-gray-300">Stok</label>
        <input type="number" v-model="form.stok" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" />
      </div>

      <div>
        <label class="block mb-1 dark:text-gray-300">Harga</label>
        <input type="number" step="0.01" v-model="form.harga" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" />
      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
  </div>
</template>

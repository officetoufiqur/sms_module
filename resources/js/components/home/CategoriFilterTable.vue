<script setup lang="ts">
import { ref, computed } from 'vue';

interface Product {
  id: number;
  name: string;
  category: string;
  price: number;
}

const products = ref<Product[]>([
  { id: 1, name: 'Phone', category: 'Mobile', price: 1500 },
  { id: 2, name: 'Laptop', category: 'Electronics', price: 2200 },
  { id: 3, name: 'Headphones', category: 'Audio', price: 150 },
  { id: 4, name: 'TV', category: 'Electronics', price: 1800 },
  { id: 5, name: 'Mouse', category: 'Accessories', price: 50 },
  { id: 6, name: 'Keyboard', category: 'Accessories', price: 100 },
  { id: 7, name: 'Tablet', category: 'Mobile', price: 900 },
  { id: 8, name: 'Speaker', category: 'Audio', price: 300 },
  { id: 9, name: 'Monitor', category: 'Electronics', price: 400 },
  { id: 10, name: 'Smartwatch', category: 'Wearable', price: 500 },
  { id: 11, name: 'Camera', category: 'Photography', price: 1200 },
  { id: 12, name: 'Charger', category: 'Accessories', price: 40 },
]);

const filters = ref({
  name: '',
  category: '',
  minPrice: 0,
  maxPrice: 10000,
});

const currentPage = ref(1);
const pageSize = 5;

const filteredProducts = computed(() => {
  return products.value.filter((product) => {
    return (
      product.name.toLowerCase().includes(filters.value.name.toLowerCase()) &&
      product.category.toLowerCase().includes(filters.value.category.toLowerCase()) &&
      product.price >= filters.value.minPrice &&
      product.price <= filters.value.maxPrice
    );
  });
});

const totalPages = computed(() => Math.ceil(filteredProducts.value.length / pageSize));

const paginatedProducts = computed(() => {
  const start = (currentPage.value - 1) * pageSize;
  return filteredProducts.value.slice(start, start + pageSize);
});

function applyFilter() {
  currentPage.value = 1;
}
</script>

<template>
  <div class="p-14">
    <h2 class="text-xl font-bold mb-4">Product Table</h2>

    <div class="flex gap-4 mb-4">
      <input v-model="filters.name" placeholder="Search name..." class="border px-2 py-1 rounded" />
      <input v-model="filters.category" placeholder="Category..." class="border px-2 py-1 rounded" />
      <input v-model="filters.minPrice" type="number" placeholder="Min Price" class="border px-2 py-1 rounded" />
      <input v-model="filters.maxPrice" type="number" placeholder="Max Price" class="border px-2 py-1 rounded" />
      <button @click="applyFilter" class="bg-blue-500 text-white px-4 py-1 rounded">Filter</button>
    </div>

    <table class="min-w-full bg-white border">
      <thead>
        <tr class="bg-gray-100">
          <th class="px-4 py-2 border">ID</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Category</th>
          <th class="px-4 py-2 border">Price</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in paginatedProducts" :key="product.id">
          <td class="px-4 py-2 border">{{ product.id }}</td>
          <td class="px-4 py-2 border">{{ product.name }}</td>
          <td class="px-4 py-2 border">{{ product.category }}</td>
          <td class="px-4 py-2 border">${{ product.price }}</td>
        </tr>
      </tbody>
    </table>

    <div class="mt-4">
      <button
        class="px-3 py-1 border rounded mr-2"
        :disabled="currentPage === 1"
        @click="currentPage--"
      >
        Prev
      </button>
      <button
        class="px-3 py-1 border rounded"
        :disabled="currentPage >= totalPages"
        @click="currentPage++"
      >
        Next
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Optional custom styling */
</style>

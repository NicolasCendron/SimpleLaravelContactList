<template>
    <button @click="mockCreate" class="mt-8 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
    Poulate Mock Contacts
  </button>
     <button @click="refreshContacts" class="mt-8 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
    Refresh Contacts
  </button>
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">📇 Contact List</h1>

      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
  <div
    v-for="contact in contacts"
    :key="contact.id"
    class="bg-white rounded-xl border border-gray-300 shadow-sm hover:shadow-md transition duration-200 p-6 flex flex-col"
  >
    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-bold text-gray-800">
        {{ contact.name }}
      </h2>
      <!-- Optional avatar or icon can go here -->
    </div>

    <!-- Category -->
    <p class="text-sm text-gray-600 mb-4">
      <span class="font-semibold text-gray-700">Category:</span>
      {{ contact.category.getName() }}
    </p>

    <!-- Phones -->
    <div v-if="contact.phones.length > 0" class="mt-auto">
      <p class="text-sm font-semibold text-gray-800 mb-2">📞 Phone Numbers</p>
      <ul class="space-y-1">
        <li
          v-for="phone in contact.phones"
          :key="phone.number"
          class="flex items-center gap-2 text-sm text-gray-700"
        >
          <span class="text-gray-500">{{ phone.phoneType.getName() }}:</span>
          <span class="text-gray-900 font-medium">{{ phone.number }}</span>
        </li>
      </ul>
    </div>
  </div>
</div>
</template>

<script setup>

import { ref, onMounted } from 'vue'
import {mockCreate} from '@/scripts/mockData'
import { getContacts } from '@/services/contactService'
import {formatContactCategory} from '@/models/contactCategory'
import { formatPhoneType } from '@/models/phoneType'
const contacts = ref([])


const refreshContacts = async () => {
  try {
    contacts.value = await getContacts()
  } catch (error) {
    console.error('Error fetching contacts:', error)
  }
}
onMounted(() => {
  refreshContacts()
})


</script>
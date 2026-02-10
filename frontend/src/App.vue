<template>
  <div class="min-h-screen flex flex-col bg-gray-100 text-left">
    <nav v-if="$route.path !== '/login'" class="bg-blue-900 text-white shadow-lg px-6 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-6">
        <span class="text-2xl font-extrabold tracking-tighter">SGIC</span>
        <div class="flex space-x-2">
          <router-link to="/dashboard" class="px-3 py-1 rounded-md transition" :class="activeClass('/dashboard')">Dashboard</router-link>
          <router-link to="/clientes" class="px-3 py-1 rounded-md transition" :class="activeClass('/clientes')">Clientes</router-link>
          <router-link to="/tickets" class="px-3 py-1 rounded-md transition" :class="activeClass('/tickets')">Tickets</router-link>
        </div>
      </div>
      <div class="bg-blue-800 text-xs px-3 py-1 rounded-full uppercase font-bold text-blue-100 italic">Proyecto Final</div>
    </nav>

    <main class="flex-1 p-8 overflow-auto">
      <div class="max-w-6xl mx-auto">
        <router-view 
          :clientes="listaClientes" 
          :tickets="listaTickets"
          @update-clientes="actualizarClientes"
          @update-tickets="actualizarTickets"
        />
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const activeClass = (path) => route.path === path ? 'bg-blue-800 font-bold text-white' : 'text-blue-100 hover:text-white'

const listaClientes = ref([])
const listaTickets = ref([])

onMounted(() => {
  const cGuardados = localStorage.getItem('sgic_clientes')
  const tGuardados = localStorage.getItem('sgic_tickets')
  if (cGuardados) listaClientes.value = JSON.parse(cGuardados)
  if (tGuardados) listaTickets.value = JSON.parse(tGuardados)
})

const actualizarClientes = (nuevaLista) => {
  listaClientes.value = nuevaLista
  localStorage.setItem('sgic_clientes', JSON.stringify(nuevaLista))
}

const actualizarTickets = (nuevaLista) => {
  listaTickets.value = nuevaLista
  localStorage.setItem('sgic_tickets', JSON.stringify(nuevaLista))
}
</script>
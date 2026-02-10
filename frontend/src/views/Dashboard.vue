<template>
  <div class="animate-fade-in text-left">
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Resumen de Gestión</h1>
      <p class="text-gray-500 mt-1">Haz clic en las tarjetas para gestionar el sistema en tiempo real.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      
      <div @click="$router.push('/tickets')" 
           class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-300 transition cursor-pointer group">
        <div class="flex items-center justify-between mb-4">
          <span class="p-2 bg-blue-50 text-blue-600 rounded-lg text-xl group-hover:bg-blue-600 group-hover:text-white transition">🎫</span>
          <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Incidentes</span>
        </div>
        <div class="text-4xl font-black text-gray-800">{{ tickets.length }}</div>
        <div class="text-gray-400 text-sm mt-1 font-medium italic">Tickets activos hoy</div>
      </div>

      <div @click="$router.push('/clientes')" 
           class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-green-300 transition cursor-pointer group">
        <div class="flex items-center justify-between mb-4">
          <span class="p-2 bg-green-50 text-green-600 rounded-lg text-xl group-hover:bg-green-600 group-hover:text-white transition">👥</span>
          <span class="text-[10px] font-bold text-green-600 uppercase tracking-widest">Clientes</span>
        </div>
        <div class="text-4xl font-black text-gray-800">{{ clientes.length }}</div>
        <div class="text-gray-400 text-sm mt-1 font-medium italic">Registrados en base</div>
      </div>

      <div @click="$router.push('/tickets')" 
           class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-red-300 transition cursor-pointer group">
        <div class="flex items-center justify-between mb-4">
          <span class="p-2 bg-red-50 text-red-600 rounded-lg text-xl group-hover:bg-red-600 group-hover:text-white transition">⚠️</span>
          <span class="text-[10px] font-bold text-red-600 uppercase tracking-widest">Críticos</span>
        </div>
        <div class="text-4xl font-black text-gray-800">{{ tickets.filter(t => t.prioridad === 'Alta').length }}</div>
        <div class="text-gray-400 text-sm mt-1 font-medium italic">Atención inmediata</div>
      </div>

    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
        <h3 class="font-bold text-gray-700 uppercase text-xs tracking-widest">Últimas Gestiones Realizadas</h3>
        <button @click="$router.push('/tickets')" class="text-blue-600 text-xs font-bold hover:underline">Ver todo</button>
      </div>
      <div v-if="tickets.length > 0" class="overflow-x-auto">
        <table class="w-full text-left">
          <tbody class="divide-y divide-gray-100">
            <tr v-for="t in tickets.slice(-3).reverse()" :key="t.id" class="hover:bg-gray-50 transition text-sm">
              <td class="px-6 py-4 font-bold text-gray-700">{{ t.cliente }}</td>
              <td class="px-6 py-4 text-gray-600">{{ t.asunto }}</td>
              <td class="px-6 py-4">
                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase border"
                      :class="t.prioridad === 'Alta' ? 'bg-red-100 text-red-700 border-red-200' : 'bg-yellow-100 text-yellow-700 border-yellow-200'">
                  {{ t.prioridad }}
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else class="p-10 text-center text-gray-400 italic text-sm">
        No hay tickets registrados aún. Comienza creando uno en la sección de Tickets.
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps(['clientes', 'tickets'])
</script>
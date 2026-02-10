<template>
  <div class="animate-fade-in text-left">
    <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-5">
      <div>
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Gestión de Tickets</h1>
        <p class="text-gray-500 mt-1">RF4: Registro y seguimiento de incidentes técnicos.</p>
      </div>
      <button @click="abrirModal" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-bold shadow-lg transition-all flex items-center gap-2">
        <span class="text-xl">+</span> Nuevo Ticket
      </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      <table class="w-full text-left">
        <thead class="bg-gray-50 border-b text-gray-400 text-xs uppercase font-bold">
          <tr>
            <th class="px-6 py-4">Asunto / ID</th>
            <th class="px-6 py-4">Cliente</th>
            <th class="px-6 py-4">Prioridad</th>
            <th class="px-6 py-4">Estado</th>
            <th class="px-6 py-4 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <tr v-for="t in tickets" :key="t.id" class="hover:bg-blue-50/50 transition">
            <td class="px-6 py-4">
              <div class="font-bold text-gray-800">{{ t.asunto }}</div>
              <div class="text-[10px] text-gray-400 italic">Fecha: {{ t.fecha }}</div>
            </td>
            <td class="px-6 py-4 text-gray-600 font-medium">{{ t.cliente }}</td>
            <td class="px-6 py-4">
              <span :class="t.prioridad === 'Alta' ? 'text-red-600 bg-red-50 border-red-100' : 'text-yellow-600 bg-yellow-50 border-yellow-100'" 
                    class="px-2 py-1 rounded text-[10px] font-black uppercase border">
                {{ t.prioridad }}
              </span>
            </td>
            <td class="px-6 py-4">
              <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold uppercase border border-blue-200">
                {{ t.estado }}
              </span>
            </td>
            <td class="px-6 py-4 text-center">
              <button @click="eliminar(t.id)" class="text-red-500 hover:underline font-bold text-xs">Eliminar</button>
            </td>
          </tr>
          <tr v-if="tickets.length === 0">
            <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">No hay tickets registrados. Crea uno nuevo para comenzar.</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-if="mostrarModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">
      <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden animate-pop">
        <div class="bg-blue-900 p-6 text-white text-center">
          <h3 class="text-xl font-bold tracking-tighter uppercase">Crear Nuevo Ticket (RF4)</h3>
        </div>
        
        <form @submit.prevent="guardar" class="p-8 space-y-4">
          <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Asunto del Incidente</label>
            <input v-model="form.asunto" type="text" placeholder="Ej: Falla en servidor de correo" class="w-full px-4 py-3 border rounded-lg bg-gray-50 outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>

          <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Cliente Asociado</label>
            <select v-model="form.cliente" class="w-full px-4 py-3 border rounded-lg bg-gray-50 outline-none focus:ring-2 focus:ring-blue-500" required>
              <option value="" disabled>Seleccione un cliente registrado...</option>
              <option v-for="c in clientes" :key="c.id" :value="c.nombre">{{ c.nombre }}</option>
            </select>
            <p v-if="clientes.length === 0" class="text-red-400 text-[10px] mt-1 font-bold italic">* Primero debes crear un cliente en la sección Clientes.</p>
          </div>

          <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Prioridad del Caso</label>
            <select v-model="form.prioridad" class="w-full px-4 py-3 border rounded-lg bg-gray-50 outline-none">
              <option value="Baja">Baja (Mantenimiento)</option>
              <option value="Media">Media (Error común)</option>
              <option value="Alta">Alta (Sistema caído)</option>
            </select>
          </div>

          <div class="flex gap-3 pt-6">
            <button type="button" @click="mostrarModal = false" class="flex-1 py-3 border rounded-lg font-bold text-gray-400 hover:bg-gray-50">Cancelar</button>
            <button type="submit" class="flex-1 py-3 bg-blue-700 text-white rounded-lg font-bold shadow-lg hover:bg-blue-800 transform active:scale-95 transition">
              Guardar Ticket
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'


const props = defineProps(['clientes', 'tickets'])
const emit = defineEmits(['update-tickets'])

const mostrarModal = ref(false)
const form = ref({
  asunto: '',
  cliente: '',
  prioridad: 'Media'
})

const abrirModal = () => {
  form.value = { asunto: '', cliente: '', prioridad: 'Media' }
  mostrarModal.value = true
}

const guardar = () => {

  const nuevoTicket = {
    id: Date.now(),
    asunto: form.value.asunto,
    cliente: form.value.cliente,
    prioridad: form.value.prioridad,
    estado: 'Abierto',
    fecha: new Date().toLocaleDateString(),
    agente: 'Administrador'
  }


  const nuevaLista = [...props.tickets, nuevoTicket]
  emit('update-tickets', nuevaLista)


  mostrarModal.value = false
  alert('¡Ticket registrado con éxito!')
}

const eliminar = (id) => {
  if (confirm('¿Desea eliminar este ticket de forma permanente?')) {
    const nuevaLista = props.tickets.filter(t => t.id !== id)
    emit('update-tickets', nuevaLista)
  }
}
</script>

<style scoped>
.animate-pop { animation: pop 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
@keyframes pop { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
</style>
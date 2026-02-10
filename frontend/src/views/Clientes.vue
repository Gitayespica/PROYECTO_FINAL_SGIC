<template>
  <div class="animate-fade-in text-left">
    <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-5">
      <div>
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Gestión de Clientes</h1>
        <p class="text-gray-500 mt-1 font-medium">RF3: Crear, Leer, Actualizar y Eliminar Clientes.</p>
      </div>
      <button @click="abrirModalCrear" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-bold shadow-lg transition-all flex items-center gap-2">
        <span class="text-xl">+</span> Nuevo Cliente
      </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      <table class="w-full text-left">
        <thead class="bg-gray-50 border-b text-gray-400 text-xs uppercase font-bold">
          <tr>
            <th class="px-6 py-4">Nombre / ID</th>
            <th class="px-6 py-4">Email de Contacto</th>
            <th class="px-6 py-4">Estado</th>
            <th class="px-6 py-4 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <tr v-for="c in clientes" :key="c.id" class="hover:bg-blue-50/50 transition">
            <td class="px-6 py-4">
              <div class="font-bold text-gray-800">{{ c.nombre }}</div>
              <div class="text-[10px] text-gray-400 italic">Ref: {{ c.id_ref }}</div>
            </td>
            <td class="px-6 py-4 text-gray-600 font-medium">{{ c.email }}</td>
            <td class="px-6 py-4">
              <span class="px-3 py-1 text-[10px] rounded-full font-black uppercase border" 
                    :class="c.estado === 'Activo' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-yellow-100 text-yellow-700 border-yellow-200'">
                {{ c.estado }}
              </span>
            </td>
            <td class="px-6 py-4 text-center space-x-3">
              <button @click="abrirModalEditar(c)" class="text-blue-600 hover:underline font-bold text-sm">Editar</button>
              <button @click="eliminar(c.id)" class="text-red-500 hover:underline font-bold text-sm">Eliminar</button>
            </td>
          </tr>
          <tr v-if="clientes.length === 0">
            <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic">No hay clientes registrados aún.</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-if="mostrarModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">
      <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden animate-pop">
        <div class="bg-blue-900 p-6 text-white text-center">
          <h3 class="text-xl font-bold uppercase tracking-widest">{{ editando ? 'Editar Cliente' : 'Registrar Nuevo Cliente' }}</h3>
        </div>
        
        <form @submit.prevent="guardar" class="p-8 space-y-5">
          <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Nombre Completo</label>
            <input v-model="form.nombre" type="text" placeholder="Ej: Banco Nacional" class="w-full px-4 py-3 border rounded-lg bg-gray-50 outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>

          <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Correo Electrónico</label>
            <input v-model="form.email" type="email" placeholder="correo@empresa.com" class="w-full px-4 py-3 border rounded-lg bg-gray-50 outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>

          <div>
            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Estado en Sistema</label>
            <select v-model="form.estado" class="w-full px-4 py-3 border rounded-lg bg-gray-50 outline-none">
              <option value="Activo">Activo</option>
              <option value="Pendiente">Pendiente</option>
            </select>
          </div>

          <div class="flex gap-3 pt-4">
            <button type="button" @click="mostrarModal = false" class="flex-1 py-3 border rounded-lg font-bold text-gray-400 hover:bg-gray-50 transition">Cancelar</button>
            <button type="submit" class="flex-1 py-3 bg-blue-700 text-white rounded-lg font-bold shadow-lg hover:bg-blue-800 transform active:scale-95 transition">
              {{ editando ? 'Guardar Cambios' : 'Registrar Cliente' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps(['clientes'])
const emit = defineEmits(['update-clientes'])

const mostrarModal = ref(false)
const editando = ref(false)
const form = ref({ id: null, nombre: '', email: '', estado: 'Activo', id_ref: '' })

const abrirModalCrear = () => {
  editando.value = false
  form.value = { id: null, nombre: '', email: '', estado: 'Activo', id_ref: '' }
  mostrarModal.value = true
}

const abrirModalEditar = (cliente) => {
  editando.value = true
  form.value = { ...cliente }
  mostrarModal.value = true
}

const guardar = () => {
  let nuevaLista = [...props.clientes]

  if (editando.value) {
    const index = nuevaLista.findIndex(c => c.id === form.value.id)
    if (index !== -1) {
      nuevaLista[index] = { ...form.value }
    }
  } else {
    const nuevo = {
      ...form.value,
      id: Date.now(),
      id_ref: 'CL-' + Math.floor(1000 + Math.random() * 9000)
    }
    nuevaLista.push(nuevo)
  }

  emit('update-clientes', nuevaLista)
  mostrarModal.value = false
  alert(editando.value ? '¡Cliente actualizado!' : '¡Cliente registrado!')
}

const eliminar = (id) => {
  if (confirm('¿Estás seguro de eliminar este cliente?')) {
    const nuevaLista = props.clientes.filter(c => c.id !== id)
    emit('update-clientes', nuevaLista)
  }
}
</script>

<style scoped>
.animate-pop { animation: pop 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
@keyframes pop { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
</style>
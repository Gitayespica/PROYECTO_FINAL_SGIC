<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
      <div class="bg-blue-900 p-8 text-center">
        <h1 class="text-4xl font-black text-white">SGIC</h1>
        <p class="text-blue-200 text-xs uppercase tracking-widest mt-2 font-bold">Proyecto Final</p>
      </div>
      <div class="p-8 text-left">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Acceso al Sistema</h2>
        <form @submit.prevent="entrar" class="space-y-4">
          <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Usuario</label>
            <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="admin@sistema.com">
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Contraseña</label>
            <input type="password" class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="••••••••">
          </div>
          <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-lg shadow-lg transition-all transform active:scale-95">
            ENTRAR
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'
const router = useRouter()
const entrar = () => { router.push('/dashboard') }
</script>
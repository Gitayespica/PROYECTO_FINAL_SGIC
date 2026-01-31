<template>
  <div>
    <h1>Clientes</h1>

    <!-- Botón para cargar clientes -->
    <button @click="loadClients">Cargar Clientes</button>

    <!-- Lista de clientes -->
    <ul v-if="clients.length">
      <li v-for="client in clients" :key="client.id">
        {{ client.name }} - {{ client.email }} - {{ client.phone || 'Sin teléfono' }}
      </li>
    </ul>

    <p v-else>No hay clientes.</p>

    <!-- Formulario para crear -->
    <form @submit.prevent="createClient">
      <input v-model="newClient.name" placeholder="Nombre" required />
      <input v-model="newClient.email" placeholder="Email" required />
      <input v-model="newClient.phone" placeholder="Teléfono" />
      <button type="submit">Crear Cliente</button>
    </form>
  </div>
</template>

<script>
import api from '../axios.js';

export default {
  name: 'Clients',

  data() {
    return {
      clients: [],
      newClient: { name: '', email: '', phone: '' },
    };
  },

  methods: {
    async loadClients() {
      try {
        const response = await api.get('/clients');
        this.clients = response.data.data || response.data;
        console.log('Clientes cargados:', this.clients);
      } catch (error) {
        console.error('Error cargando clientes:', error);
        alert('Error al cargar clientes. Revisa la consola.');
      }
    },

    async createClient() {
      try {
        await api.post('/clients', this.newClient);
        this.loadClients();
        this.newClient = { name: '', email: '', phone: '' };
        alert('Cliente creado exitosamente!');
      } catch (error) {
        console.error('Error creando cliente:', error.response || error);
        alert('Error al crear cliente. Revisa la consola para más detalles.');
      }
    },
  },

  mounted() {
    this.loadClients(); // Cargar clientes al abrir la página
  },
};
</script>

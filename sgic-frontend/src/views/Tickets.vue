<template>
  <div>
    <h1>Tickets</h1>

    <!-- Botón para cargar tickets -->
    <button @click="loadTickets">Cargar Tickets</button>

    <!-- Lista de tickets -->
    <ul v-if="tickets.length">
      <li v-for="ticket in tickets" :key="ticket.id">
        {{ ticket.title }} - {{ ticket.status }} - Prioridad: {{ ticket.priority }}
      </li>
    </ul>

    <p v-else>No hay tickets.</p>

    <!-- Formulario para crear -->
    <form @submit.prevent="createTicket">
      <input v-model="newTicket.title" placeholder="Título" required />
      <textarea v-model="newTicket.description" placeholder="Descripción" required></textarea>
      <select v-model="newTicket.status" required>
        <option value="open">Abierto</option>
        <option value="in_progress">En Progreso</option>
        <option value="closed">Cerrado</option>
      </select>
      <select v-model="newTicket.priority" required>
        <option value="low">Baja</option>
        <option value="medium">Media</option>
        <option value="high">Alta</option>
      </select>
      <input v-model.number="newTicket.client_id" placeholder="ID Cliente" required />
      <input v-model.number="newTicket.assigned_to" placeholder="ID Usuario Asignado" />
      <button type="submit">Crear Ticket</button>
    </form>
  </div>
</template>

<script>
import api from '../axios.js';

export default {
  name: 'Tickets',

  data() {
    return {
      tickets: [],
      newTicket: { title: '', description: '', status: 'open', priority: 'low', client_id: 1, assigned_to: null },
    };
  },

  methods: {
    async loadTickets() {
      try {
        const response = await api.get('/tickets');
        this.tickets = response.data.data || response.data;
        console.log('Tickets cargados:', this.tickets);
      } catch (error) {
        console.error('Error cargando tickets:', error);
        alert('Error al cargar tickets. Revisa la consola.');
      }
    },

    async createTicket() {
      try {
        const payload = { ...this.newTicket, client_id: Number(this.newTicket.client_id), assigned_to: this.newTicket.assigned_to ? Number(this.newTicket.assigned_to) : null };
        await api.post('/tickets', payload);
        this.loadTickets();
        this.newTicket = { title: '', description: '', status: 'open', priority: 'low', client_id: 1, assigned_to: null };
        alert('Ticket creado exitosamente!');
      } catch (error) {
        console.error('Error creando ticket:', error.response || error);
        alert('Error al crear ticket. Revisa la consola para más detalles.');
      }
    },
  },

  mounted() {
    this.loadTickets(); // Cargar tickets al abrir la página
  },
};
</script>

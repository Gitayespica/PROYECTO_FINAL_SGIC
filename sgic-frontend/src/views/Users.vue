<template>
  <div>
    <h1>Usuarios</h1>

    <!-- Botón para cargar usuarios -->
    <button @click="loadUsers">Cargar Usuarios</button>

    <!-- Lista de usuarios -->
    <ul v-if="users.length">
      <li v-for="user in users" :key="user.id">
        {{ user.name }} - {{ user.email }} - Rol: {{ user.role_id }}
      </li>
    </ul>

    <p v-else>No hay usuarios.</p>

    <!-- Formulario para crear -->
    <form @submit.prevent="createUser">
      <input v-model="newUser.name" placeholder="Nombre" required />
      <input v-model="newUser.email" placeholder="Email" required />
      <input v-model="newUser.password" type="password" placeholder="Contraseña" required />
      <input v-model.number="newUser.role_id" placeholder="ID Rol" required />
      <button type="submit">Crear Usuario</button>
    </form>
  </div>
</template>

<script>
import api from '../axios.js';  // Axios configurado con baseURL

export default {
  name: 'Users',

  data() {
    return {
      users: [],  // Lista de usuarios
      newUser: { name: '', email: '', password: '', role_id: 1 }, // Datos del formulario
    };
  },

  methods: {
    // Cargar usuarios desde la API
    async loadUsers() {
      try {
        const response = await api.get('/users');
        this.users = response.data.data || response.data;
        console.log('Usuarios cargados:', this.users);
      } catch (error) {
        console.error('Error cargando usuarios:', error);
        alert('Error al cargar usuarios. Revisa la consola.');
      }
    },

    // Crear nuevo usuario
    async createUser() {
      try {
        // Convertimos role_id a número por seguridad
        const payload = { ...this.newUser, role_id: Number(this.newUser.role_id) };
        await api.post('/users', payload);

        this.loadUsers(); // Recargar la lista
        this.newUser = { name: '', email: '', password: '', role_id: 1 }; // Limpiar formulario
        alert('Usuario creado exitosamente!');
      } catch (error) {
        console.error('Error creando usuario:', error.response || error);
        alert('Error al crear usuario. Revisa la consola para más detalles.');
      }
    },
  },

  mounted() {
    this.loadUsers(); // Cargar usuarios automáticamente al abrir la página
  },
};
</script>

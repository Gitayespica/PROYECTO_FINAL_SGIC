import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/Dashboard.vue';  // Se importan las  vistas
import Users from '../views/Users.vue';
import Clients from '../views/Clients.vue';
import Tickets from '../views/Tickets.vue';

const routes = [
  { path: '/', name: 'Dashboard', component: Dashboard },  // /Corresponde a → Dashboard
  { path: '/users', name: 'Users', component: Users },     // /Corresponde users → Usuarios
  { path: '/clients', name: 'Clients', component: Clients }, // /Corresponde clients → Clientes
  { path: '/tickets', name: 'Tickets', component: Tickets }, // /Corresponde tickets → Tickets
];

const router = createRouter({
  history: createWebHistory(),  // Se genera el modo de historia para las URLs limpias
  routes,
});

export default router;
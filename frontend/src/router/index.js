import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/login.vue'
import Dashboard from '../views/dashboard.vue'
import Clientes from '../views/Clientes.vue'
import Tickets from '../views/Tickets.vue' // <-- IMPORTAR

const routes = [
  { path: '/', redirect: '/login' },
  { path: '/login', name: 'Login', component: Login },
  { path: '/dashboard', name: 'Dashboard', component: Dashboard },
  { path: '/clientes', name: 'Clientes', component: Clientes },
  { path: '/tickets', name: 'Tickets', component: Tickets } // <-- AGREGAR
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
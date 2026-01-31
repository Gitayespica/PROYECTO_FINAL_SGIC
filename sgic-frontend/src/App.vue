<script setup></script>

<template>
  <div id="app">
    <!-- Es el menú simple para navegar -->
    <nav>
      <router-link to="/">Dashboard</router-link> |
      <router-link to="/users">Usuarios</router-link> |
      <router-link to="/clients">Clientes</router-link> |
      <router-link to="/tickets">Tickets</router-link>
    </nav>
    <!-- Para mostrar  la página actual (Dashboard, Users, etc.) -->
    <router-view />
  </div>
</template>

<style>
nav {
  background-color: lightgray;
  padding: 10px;
}
nav a {
  margin: 0 10px;
  text-decoration: none;
  color: blue;
}
nav a.router-link-active {
  font-weight: bold;
}
</style>
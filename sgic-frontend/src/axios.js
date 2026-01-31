import axios from 'axios';

// Se configura Axios para que esté unido al API de Laravel
const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',  // URL base del API creado antes (cambia dependiendo del puerto)
  headers: {
    'Content-Type': 'application/json',  // Se utiliza para que siempre  envíe JSON
  },
});

export default api;  // Se exporta para usarlo en otros archivos

<template>
    <div>
      <h1>Weather info</h1>
      <div v-if="loading">Loading...</div>
      <table v-if="weather.length && !loading" class="weather-table">
      <thead>
        <tr>
          <th>City</th>
          <th>Temperature</th>
          <th>Humidity</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="entry in weather" :key="entry.id">
          <td>{{ entry.city }}</td>
          <td>{{ entry.temperature }}°C</td>
          <td>{{ entry.humidity }}</td>
          <td>{{ entry.description }}%</td>
        </tr>
      </tbody>
    </table>
      <div v-if="error">{{ error }}</div>
    </div>
</template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        weather: [],
        loading: true,
        error: ''
      };
    },
    methods: {
      async fetchWeather() {
        try {
          const response = await axios.get('http://127.0.0.1:8000/api/weather');
          this.weather = response.data;
        } catch (err) {
          this.error = 'Failed to fetch weather';
        } finally {
          this.loading = false;
        }
      }
    },
    created() {
      this.fetchWeather();
    }
  };
  </script>
  <style>
  .weather-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  .weather-table th, .weather-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  
  .weather-table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  
  .weather-table tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  .weather-table tr:hover {
    background-color: #f1f1f1;
  }
  </style>
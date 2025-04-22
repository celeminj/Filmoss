<template>
  <div class="chart-container">
    <h2>Usuarios por Rol</h2>
    <canvas id="rolesChart"></canvas>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      usuarios: [],
      roles: [],
      rolesChart: null
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      Promise.all([
        axios.get('usuario'),
        axios.get('rol')
      ]).then(([usuariosRes, rolesRes]) => {
        this.usuarios = usuariosRes.data;
        this.roles = rolesRes.data;
        this.renderChart();
      }).catch(error => {
        console.error('Error obteniendo datos:', error);
      });
    },
    renderChart() {
      const ctx = document.getElementById('rolesChart');
      if (!ctx) return;

      const labels = this.roles.map(r => r.tipo_rol || `Rol ${r.id}`);
      const data = this.roles.map(r => {
        return this.usuarios.filter(u => u.rol_id === r.id).length;
      });

      const colores = ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#8B8B8B'];

      if (this.rolesChart) this.rolesChart.destroy();

      this.rolesChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            data: data,
            backgroundColor: colores.slice(0, data.length),
          }]
        },
        options: {
          plugins: {
            legend: { position: 'bottom' },
            tooltip: {
              callbacks: {
                label: (tooltipItem) => `${tooltipItem.label}: ${tooltipItem.raw} usuario(s)`
              }
            }
          }
        }
      });
    }
  },
  beforeUnmount() {
    if (this.rolesChart) this.rolesChart.destroy();
  }
};
</script>

<style scoped>
.chart-container {
  width: 100%;
  max-width: 600px;
  margin: auto;
  padding: 1rem;
}
h2{
  text-align: center;
  margin-bottom: 1rem;
  font-family: 'Lexend', sans-serif;
  font-size: 1.5rem;
  color: #2EBFA5;
}
</style>

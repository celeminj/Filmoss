<template>
    <div class="container-stats">
      <canvas id="myChart"></canvas>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        usuarios: [],
        roles: [],
        chart: null,
      };
    },
    created() {
      this.selectUsuario();
      this.getRoles();
    },
    methods: {
      getRoles() {
        axios.get('rol')
          .then(response => {
            this.roles = response.data;
            this.renderChart();
          })
          .catch(error => {
            console.error(error);
          });
      },
      selectUsuario() {
        axios.get('usuario')
          .then(response => {
            this.usuarios = response.data;
            this.renderChart();
          })
          .catch(error => {
            console.error(error);
          });
      },
      renderChart() {
        if (this.usuarios.length === 0 || this.roles.length === 0) return;

        const ctx = document.getElementById('myChart').getContext('2d');

        const labels = this.roles.map(r => r.nombre);
        const data = this.roles.map(r => {
          return this.usuarios.filter(u => u.rol_id === r.id).length;
        });

        const colores = [
          '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#8B8B8B'
        ];

        if (this.chart) this.chart.destroy();

        this.chart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: labels,
            datasets: [{
              label: 'Usuarios por Rol',
              data: data,
              backgroundColor: colores.slice(0, data.length),
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'bottom',
              },
              tooltip: {
                callbacks: {
                  label: (tooltipItem) => {
                    const rolNombre = tooltipItem.label;
                    const cantidad = tooltipItem.raw;
                    return `${rolNombre}: ${cantidad} usuario(s)`;
                  }
                }
              }
            }
          }
        });
      }
    }
  };
  </script>

  <style scoped>
.container-stats {
    width: 50%;
    height: 50%;
    margin: 0 auto;
    display: flex;
    justify-content: center;
  }
  </style>

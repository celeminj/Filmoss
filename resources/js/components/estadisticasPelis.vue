<template>
  <div class="chart-container">
    <h2>Películas estrenadas por año</h2>
    <canvas id="moviesChart"></canvas>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      peliculas: [],
      moviesChart: null
    };
  },
  mounted() {
    this.getPeliculas();
  },
  methods: {
    getPeliculas() {
      axios.get('pelicula')
        .then(response => {
          this.peliculas = response.data;
          this.renderChart();
        })
        .catch(error => {
          console.log(error);
        });
    },
    renderChart() {
      const ctx = document.getElementById('moviesChart');
      if (!ctx) return;

      // Obtener el año de la fecha de estreno
      const years = this.peliculas.map(p => new Date(p.fecha_estreno).getFullYear());

      // Contar cuántas películas hay por año
      const yearCounts = years.reduce((acc, year) => {
        acc[year] = (acc[year] || 0) + 1;
        return acc;
      }, {});

      const sortedYears = Object.keys(yearCounts).sort();
      const data = sortedYears.map(year => yearCounts[year]);

      if (this.moviesChart) this.moviesChart.destroy();

      this.moviesChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: sortedYears,
          datasets: [{
            label: 'Películas estrenadas',
            data: data,
            backgroundColor: '#36A2EB',
            borderRadius: 5
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              callbacks: {
                label: (tooltipItem) =>
                  `${tooltipItem.label}: ${tooltipItem.raw} película(s)`
              }
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                precision: 0
              }
            }
          }
        }
      });
    }
  },
  beforeUnmount() {
    if (this.moviesChart) this.moviesChart.destroy();
  }
};
</script>

<style scoped>
.chart-container {
  width: 100%;
  max-width: 1000px;
  margin: auto;
  padding: 1rem;
  margin-top: 100px;
}
h2{
  text-align: center;
  margin-bottom: 1rem;
  font-family: 'Lexend', sans-serif;
  font-size: 1.5rem;
  color: #2EBFA5;
}
</style>

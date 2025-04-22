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

      const years = this.peliculas.map(p => new Date(p.fecha_estreno).getFullYear());

      const yearCounts = years.reduce((acc, year) => {
        acc[year] = (acc[year] || 0) + 1;
        return acc;
      }, {});

      const sortedYears = Object.keys(yearCounts).sort();
      const data = sortedYears.map(year => yearCounts[year]);

      if (this.moviesChart) this.moviesChart.destroy();

      const backgroundColors = [
        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
        '#9966FF', '#FF9F40', '#8B8B8B', '#00D084',
        '#FF5E3A', '#A4C400', '#D80073', '#E3C800'
      ];

      this.moviesChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          labels: sortedYears,
          datasets: [{
            label: 'Películas estrenadas',
            data: data,
            backgroundColor: backgroundColors.slice(0, sortedYears.length),
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'right'
            },
            tooltip: {
              callbacks: {
                label: (tooltipItem) =>
                  `${tooltipItem.label}: ${tooltipItem.raw} película(s)`
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
  max-width: 700px;
  margin: auto;
  background: #1F1E24;
  padding: 1rem;
  border-radius: 10px;
  box-shadow: 0 2px 20px rgba(46, 169, 112, 0.389);
}
.chart-container h2 {
  text-align: center;
  color: #2EBFA5;
  font-family: "Poppins", sans-serif;
  margin-bottom: 1rem;
}
</style>

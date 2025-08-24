<script setup lang="ts">
import Chart, { type ChartConfiguration } from 'chart.js/auto';
import { onMounted, onBeforeUnmount, ref } from 'vue';

const chart = ref<HTMLCanvasElement | null>(null);
let chartInstance: Chart | null = null;

const labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

const props = defineProps<{
  success: number[];
  pending: number[];
  failed: number[];
}>();

const data = {
  labels: labels,
  datasets: [
    {
      label: 'Success',
      data: props.success,
      borderColor: 'rgb(75, 192, 192)',
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      tension: 0.4,
      fill: true
    },
    {
      label: 'Pending',
      data: props.pending,
      borderColor: 'rgb(255, 205, 86)',
      backgroundColor: 'rgba(255, 205, 86, 0.2)',
      tension: 0.4,
      fill: true
    },
    {
      label: 'Failed',
      data: props.failed,
      borderColor: 'rgb(255, 99, 132)',
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      tension: 0.4,
      fill: true
    }
  ]
};

const config: ChartConfiguration<'line'> = {
  type: 'line',
  data: data,
  options: {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: 'Send Sms Report',
        position: 'top' as const,
        align: 'start' as const,
        font: {
          size: 18
        }
      },
      legend: {
        position: 'top' as const,
        align: 'end' as const,
        labels: {
          usePointStyle: true,
          boxWidth: 20
        }
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        max: 40,
        ticks: {
          stepSize: 2
        }
      },
      x: {
        grid: {
          display: false
        }
      }
    },
    elements: {
      point: {
        radius: 0
      }
    }
  }
};

onMounted(() => {
  if (chart.value) {
    chartInstance = new Chart(chart.value, config);
  }
});

onBeforeUnmount(() => {
  if (chartInstance) {
    chartInstance.destroy();
  }
});
</script>

<template>
  <div style="width: 100%; height: 52vh;"> <!-- Full viewport height -->
    <canvas ref="chart" style="width: 100%; height: 100%;"></canvas>
  </div>
</template>

<script setup lang="ts">
import Chart from 'chart.js/auto';
import { onMounted, onBeforeUnmount, ref } from 'vue';

const chart = ref<HTMLCanvasElement | null>(null);
let chartInstance: Chart | null = null;

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

const data = {
    labels: labels,
    datasets: [
        {
            label: 'My First dataset',
            backgroundColor: '#0f79bc',
            borderColor: '#0f79bc',
            data: [0, 10, 5, 2, 20, 30, 45],
        },
    ],
};

const config = {
    type: 'bar' as const,
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
    },
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
    <div style="width: 100%; max-width: none; height: 500px;">
        <canvas ref="chart"></canvas>
    </div>
</template>
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
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        },
    ],
};

const config = {
    type: 'bar' as const,
    data: data,
    options: {},
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
    <div style="width: 100%; max-width: none;">
        <canvas ref="chart" width="1494" height="500"></canvas>
    </div>
</template>
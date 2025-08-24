<script setup lang="ts">
import Chart from 'chart.js/auto';
import { onMounted, onBeforeUnmount, ref } from 'vue';

const chart = ref<HTMLCanvasElement | null>(null);
let chartInstance: Chart | null = null;

const props = defineProps<{
    lables: string[];
    values: number[];
}>();



const labels = props.lables;

const data = {
    labels: labels,
    datasets: [
        {
            label: 'Monthly Total Revenue',
            backgroundColor: '#0f79bc',
            borderColor: '#0f79bc',
            data: props.values,
        },
    ],
};

const config = {
    type: 'bar' as const,
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 30000,
                ticks: {
                    callback: function (value: number | string) {
                        if (typeof value === 'number') {
                            return '$' + value / 1000 + 'k';
                        }
                        return value;
                    },
                    stepSize: 1000
                }
            }, 
        },
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
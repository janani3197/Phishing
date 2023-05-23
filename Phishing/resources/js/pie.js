import './bootstrap';
import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import axios from 'axios';

createApp({

    data() {
        return {
            chartData: null
        };
    },
    mounted() {
        this.fetchChartData();
    },
    methods: {
        fetchChartData() {
            axios.get('/phishing-chart')
                .then(response => {
                    this.chartData = response.data;
                    this.displayChart();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        displayChart() {
            const chartContainer = document.getElementById('emailChart').getContext('2d');
            new Chart(chartContainer, {
                type: 'pie',
                data: {
                    labels: ['Opened Emails', 'Ignored Emails'],
                    datasets: [{
                        data: [this.chartData.opened, this.chartData.ignored],
                        backgroundColor: ['#36a2eb', '#ff6384']
                    }]
                },
                options: {
                    responsive: true
                }
            });
        }
    }
    
            
        
    
}).mount('#app')
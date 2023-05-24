import { ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { ProductService } from '@/service/ProductService';
import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import PrimeVue from 'primevue/config';
import axios from 'axios';
import './bootstrap';

const products = ref([]);

onMounted(() => {
    ProductService.getProductsMini().then((data) => (products.value = data));
});

const app = createApp({
    setup() {
        return {
            products
        };
    }
});

app.use(PrimeVue);
app.mount('#app');

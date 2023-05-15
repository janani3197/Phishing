import './bootstrap';
import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import axios from 'axios';

createApp({

    data() {
        return {
            email: '',
            message: '',    
            name: '',   
            submitting: false,
        };
    },

    mounted() {
        // Fetch the users from the server
        // this.getUser();
        // this.getPatient();
        console.log('its working')

    },

    computed: {
       
    },

    methods: {
        
        sendEmail() {
            this.submitting = true; // set submitting to true
            axios.post('/sendemail', {
                email: this.email,
                message: this.message,
                name: this.name
            }).then(response => {
                console.log(response);
                alert('Email sent successfully!');
            }).catch(error => {
                console.error(error);
                alert('Failed to send email.');
            }).finally(() => {
                this.submitting = false; // set submitting to false
            });
        }   
            
        },
    
}).mount('#app')
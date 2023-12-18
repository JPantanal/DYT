<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import { Head } from '@inertiajs/vue3';

export default {
    name: "Payment",
    components:{
        AuthenticatedLayout
    },

    mounted(){
        // Only load the PayPal script if it hasn't already been loaded
        if (!window.paypal) {
            const script = document.createElement('script');
            script.src = 'https://www.paypal.com/sdk/js?client-id=Acj9iAugyLRMLFNlb5J82ELvqHFgVQJtEppVnth9mUlcNEvowe3k4u7R1Hwo1TAPZi7ATBKoRhDdAppV&components=buttons,marks,messages&currency=USD';
            script.addEventListener('load', this.onPayPalScriptLoad);
            document.body.appendChild(script);
        } else {
            this.onPayPalScriptLoad();
        }
    },
    methods: {
        onPayPalScriptLoad() {
            // The PayPal script is loaded and ready to use
            // Initialize the PayPal buttons
            paypal.Buttons({
                createOrder: (data, actions) => {
                    // Set up the transaction
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '0.01' // Replace with the actual amount
                            }
                        }]
                    });
                },
                onApprove: (data, actions) => {
                    // Capture the funds from the transaction
                    return actions.order.capture().then((details) => {
                        // Show a success message to your buyer
                        alert('Transaction completed by ' + details.payer.name.given_name);
                        // Optionally, you can redirect the user or update the UI state
                    });
                },
                onError: (err) => {
                    // Show an error message to your buyer
                    console.error('PayPal Checkout onError', err);
                    // Optionally, handle the error
                }
            }).render('#paypal-button-container'); // The element with this ID should be in your template
        }
    }
    }
</script>

<template>
    <Head title="Payments" />
    <AuthenticatedLayout>
        <div class="flex justify-center items-center h-screen">
            <div id="paypal-button-container"></div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>

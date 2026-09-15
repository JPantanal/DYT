<script setup>
import { onMounted } from 'vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head } from '@inertiajs/vue3'

const loadPayPal = () => {
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [
                    { amount: { value: '0.01' } }
                ]
            })
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then((details) => {
                alert('Transaction completed by ' + details.payer.name.given_name)
            })
        },
        onError: (err) => {
            console.error('PayPal Checkout onError', err)
        }
    }).render('#paypal-button-container')
}

onMounted(() => {
    if (!window.paypal) {
        const script = document.createElement('script')
        script.src =
            'https://www.paypal.com/sdk/js?client-id=Acj9iAugyLRMLFNlb5J82ELvqHFgVQJtEppVnth9mUlcNEvowe3k4u7R1Hwo1TAPZi7ATBKoRhDdAppV&components=buttons,marks,messages&currency=USD'
        script.addEventListener('load', loadPayPal)
        document.body.appendChild(script)
    } else {
        loadPayPal()
    }
})
</script>


<template>

    <Head title="Payments" />

    <AuthenticatedLayout>
        <div class="payments-wrapper">
            <div id="paypal-button-container"></div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.payments-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
    /* gives space to center */
    width: 100%;
}

/* PayPal iframe sometimes needs help centering */
#paypal-button-container iframe {
    display: block;
    margin: 0 auto;
}
</style>

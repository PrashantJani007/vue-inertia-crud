<script setup lang="ts">
import { useForm, router } from "@inertiajs/vue3";
import { defineProps } from 'vue';
import CustomerForm from './CustomForm.vue';
import Layout from '../Layouts/Layout.vue';

interface Errors {
    [key: string]: string[];
}

const props = defineProps<{
    errors: Errors;
    success: string;
}>();

const form = useForm({
    name: null as string | null,
    email: null as string | null,
    phone: null as string | null
});

function submit(form: typeof form) {
    form.post('/customers');
}
</script>

<template>
    <Layout>
        <div class="card col-6 offset-3">
            <div class="card-header">
                Create Customer
            </div>
            <div class="card-body">
                <CustomerForm
                    :errors="props.errors"
                    :success="props.success"
                    :customer="form"
                    submitButtonText="Create"
                    @submit="submit"
                />
            </div>
        </div>
    </Layout>
</template>

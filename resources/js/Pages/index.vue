<script setup lang="ts">
import { defineProps } from "vue";
import { router } from "@inertiajs/vue3";
import Layout from '../Layouts/Layout.vue';

interface Routes {
    destroy: string;
    view: string;
    edit: string;
}

interface Customer {
    id: number;
    name: string;
    email: string;
    phone: string;
}

const props = defineProps<{
    customers: Customer[];
    routes: Routes;
}>();

function destroy(id: number) {
    if (confirm('Are you sure you want to delete this customer?')) {
        const url = props.routes.destroy.replace(':id', id.toString());
        router.get(url);
    }
}

function view(id: number) {
    const url = props.routes.view.replace(':id', id.toString());
    router.get(url);
}

function edit(id: number) {
    const url = props.routes.edit.replace(':id', id.toString());
    router.get(url);
}
</script>

<template>
    <Layout>
        <br><br>
        <div class="card col-8 offset-2">
            <div v-if="$page.props.flash && $page.props.flash.message" class="alert alert-success">
                {{ $page.props.flash.message }}
            </div>
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer in customers" :key="customer.id">
                        <td>{{ customer.name }}</td>
                        <td>{{ customer.email }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>
                            <button @click.prevent="view(customer.id)" class="btn btn-primary">View</button>&nbsp;&nbsp;
                            <button @click.prevent="edit(customer.id)" class="btn btn-success">Edit</button>&nbsp;&nbsp;
                            <button @click.prevent="destroy(customer.id)" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

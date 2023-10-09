<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditBtn from '@/OwnComponents/EditBtn.vue';
import DeleteBtn from '@/OwnComponents/DeleteBtn.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SimplePagination from '@/OwnComponents/SimplePagination.vue';

const props = defineProps({
    categories: Object,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-left">Name</th>
                                <th class="text-left">Slug</th>
                                <th class="text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories.data" :key="category.id">
                                <td>{{category.name}}</td>
                                <td>{{category.slug}}</td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <EditBtn :url="route('categories.edit',{category: category.id})"></EditBtn>

                                        <DeleteBtn :url="route('categories.destroy',{category: category.id})" module-name="category"></DeleteBtn>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-10">
                        <!-- <div class="flex items-center justify-between">
                            <PrimaryButton :href="categories.links.prev" :disable="!categories.links.prev" :class="{'opacity-25': !categories.links.prev}">Previous</PrimaryButton>
                            <PrimaryButton :href="categories.links.next" :disable="!categories.links.next" :class="{'opacity-25': !categories.links.next}">Next</PrimaryButton>
                        </div> -->
                        <SimplePagination :prevUrl="categories.links.prev" :nextUrl="categories.links.next"></SimplePagination>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

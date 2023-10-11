<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditBtn from '@/OwnComponents/EditBtn.vue';
import DeleteBtn from '@/OwnComponents/DeleteBtn.vue';
import SimplePagination from '@/OwnComponents/SimplePagination.vue';
import AppTable from '@/OwnComponents/Table.vue';
import Container from '@/OwnComponents/Container.vue';
import Card from '@/OwnComponents/Card.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    categories: Object,
});

const headers = [
    { name: "Name" },
    { name: "Slug" },
    {
        name: "Actions",
        class: "text-right"
    }
];

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>

        <Container>
            <PrimaryButton :href="route('categories.create')">Add new</PrimaryButton>

            <Card class="mt-4">
                <AppTable :headers="headers">
                    <tr v-for="category in categories.data" :key="category.id">
                        <td>{{ category.name }}</td>
                        <td>{{ category.slug }}</td>
                        <td>
                            <div class="flex items-center justify-end space-x-2">
                                <EditBtn :url="route('categories.edit', { category: category.id })"></EditBtn>

                                <DeleteBtn :url="route('categories.destroy', { category: category.id })"
                                    module-name="category"></DeleteBtn>
                            </div>
                        </td>
                    </tr>
                </AppTable>

                <div class="mt-10">

                    <SimplePagination :prevUrl="categories.links.prev" :nextUrl="categories.links.next">
                    </SimplePagination>
                </div>
            </Card>
        </Container>

    </AppLayout>
</template>

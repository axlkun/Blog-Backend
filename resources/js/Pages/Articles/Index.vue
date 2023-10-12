<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditBtn from '@/OwnComponents/EditBtn.vue';
import DeleteBtn from '@/OwnComponents/DeleteBtn.vue';
import SimplePagination from '@/OwnComponents/SimplePagination.vue';
import AppTable from '@/OwnComponents/Table.vue';
import Container from '@/OwnComponents/Container.vue';
import Card from '@/OwnComponents/Card.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BreadCroumbs from '@/OwnComponents/BreadCroumbs.vue';

const props = defineProps({
    articles: Object,
});

const headers = [
    { name: "Title" },
    { name: "Slug" },
    { name: "Created date" },
    {
        name: "Actions",
        class: "text-right"
    }
];

const breadcrumbs = [
    {
        label: "articles"
    }
];

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <BreadCroumbs :items="breadcrumbs"></BreadCroumbs>
        </template>

        <Container>
            <PrimaryButton :href="route('articles.create')">Add new</PrimaryButton>

            <Card class="mt-4">
                <AppTable :headers="headers">
                    <tr v-for="article in articles.data" :key="article.id">
                        <td>{{ article.title }}</td>
                        <td>{{ article.slug }}</td>
                        <td>{{ article.created_at_formated }}</td>
                        <td>
                            <div class="flex items-center justify-end space-x-2">
                                <EditBtn :url="route('articles.edit', { article: article.id })"></EditBtn>

                                <DeleteBtn :url="route('articles.destroy', { article: article.id })"
                                    module-name="article"></DeleteBtn>
                            </div>
                        </td>
                    </tr>

                    <tr v-if="articles.data.length === 0" aria-colspan="headers.length"><div class="p-4">No data available</div></tr>
                </AppTable>

                <div v-if="articles.data.length > 0"  class="mt-10">

                    <SimplePagination :prevUrl="articles.links.prev" :nextUrl="articles.links.next">
                    </SimplePagination>
                </div>
            </Card>
        </Container>

    </AppLayout>
</template>

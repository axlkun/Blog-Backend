<script setup>
import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';
import { strSlug } from "@/helpers.js";

import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    name: "",
    slug: ""
});

watch(
    () => form.name, // use a getter like this
    (name) => {
        form.slug = strSlug(name);
    }
)

const saveCategory = () => {

    form.post(route('categories.store'));
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add new category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="saveCategory">
                        <div>
                            <InputLabel for="name" value="Name" />
                            <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                                autocomplete="name" />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="slug" value="Slug" />
                            <TextInput id="slug" v-model="form.slug" type="text" class="mt-1 block w-full" required
                                autocomplete="slug" />
                            <InputError :message="form.errors.slug" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                                Saved.
                            </ActionMessage>

                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

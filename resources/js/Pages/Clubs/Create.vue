<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import { useForm } from '@inertiajs/vue3'

const form = useForm({
     club_name:'',
     club_delegate:''
});

</script>

<template>
    <AppLayout title="Crear Club">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Club
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="$event => form.post(route('clubs.store'))"
                        class="mt-6 space-y-6 max-w-xl">
                        <InputLabel for="club_name" value="Club"></InputLabel>
                        <TextInput id="club_name" v-model="form.club_name" autofocus required
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.club_name"
                        class="mt-2"></InputError>
                        <InputLabel for="club_delegate" value="Delegado"></InputLabel>
                        <TextInput id="club_delegate" v-model="form.club_delegate" autofocus required
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.club_delegate"
                        class="mt-2"></InputError>
                        <PrimaryButton :disabled="form.processing">
                            <i class="fa-solid fa-save"></i> Guardar
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

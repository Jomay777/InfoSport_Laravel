<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';

import {Link, useForm} from '@inertiajs/vue3'

const props = defineProps ({
    clubs: {type:Object}
});
const form = useForm({
    id:''
});
const deleteClub = (id, club_name) =>{
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Estas seguro de eliminar'+club_name+'?',
        icon:'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"/> Si, Eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"/> Cancelar'
    }).then((result) => {
        if(result.isConfirmed){
            form.delete(route('clubs.destroy',id));
        }
    });
}
</script>

<template>
    <AppLayout title="Clubes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clubes
            </h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('clubs.create')"
                    :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                    <i class="fa-solid fa-plus-circle"></i> Añadir
                    </Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">CLUB</th>
                            <th class="px-4 py-4">DELEGADO</th>
                            <th class="px-4 py-4"></th>
                            <th class="px-4 py-4"></th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <tr v-for="club, i in clubs" :key="club.id">
                            <td class="border border-gray-400 px-4 py-4">{{ (i+1)  }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ club.club_name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ club.club_delegate }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('clubs.edit', club.id)"
                                :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                                <i class="fa-solid fa-edit"></i> Editar
                                </Link>
                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="deleteClub(club.id, club.club_name)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>        
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
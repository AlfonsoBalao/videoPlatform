<script>    
export default {
    name: 'LessonsIndex'
}

</script>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>


<template>
    <AppLayout title="Lessons">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Lessons
            </h1>

            <p>¿Se ve bien?</p>
        </template>
    </AppLayout>
</template>
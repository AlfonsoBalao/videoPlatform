<script>    
export default {
    name: 'CategoriesIndex'
}

</script>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>


<template>
    <AppLayout title="Categories">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class = 'flex justify-between'>
                            <Link :href = "route('categories.create')">
                                Create category
                            </Link>
                        </div>
                    </div>

                    <div class = "mt-4">
                    TODO TABLE
                    </div>
            </div>
        </div>

        
    </AppLayout>
</template>
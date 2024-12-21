<script>    
export default {
    name: 'CategoriesIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'


defineProps({
    categories: {
        type: Object,
        required: true
    }
})

const deleteCategory = id => {
    if (confirm('Are you sure you want to delete this category?')) {
        router.delete(route('categories.destroy', id), {
            onSuccess: () => {
                router.get(route('categories.index'), {}, { preserveState: false });
            },
        });
    }
};


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
                        <div class = 'flex justify-between' v-if = "$page.props.user.permissions.includes('create categories')">
                            <Link :href = "route('categories.create')" class="font-semibold text-white text-lg bg-indigo-500 hover:bg-indigo-700 rounded py-2 px-4 opacity-80" v-if = "$page.props.user.permissions.includes('create categories')">
                                Create category
                            </Link>
                        </div>
                        <div class = "mt-4">
                            <ul role="list" class="divide-y divide-gray-100">
                                <li class="flex justify-between gap-x-6 py-5" v-for = "category in categories.data">
                                    <div class="flex min-w-0 gap-x-4">
                                            <div class="min-w-0 flex-auto">
                                                <p class="text-md font-semibold text-gray-900">{{category.name}}</p>
                                            </div>
                                    </div>
                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p class="text-md text-gray-900">
                                            <Link class="py-1 px-4 border-solid border-2 border-sky-500 rounded-md mr-4 bg-sky-50" :href = "route('categories.edit',category.id )" v-if = "$page.props.user.permissions.includes('update categories')">Edit</Link> 
                                            <Link class="py-1 px-4 border-solid border-2 border-rose-500 rounded-md bg-rose-50" @click = "deleteCategory(category.id)" v-if = "$page.props.user.permissions.includes('delete categories')">Delete</Link>
                                        </p>
                                    </div>
                                 </li>
                            </ul>
                        </div>
                        <div class = 'flex justify-between mt-2'>

                            <Link v-if = "categories.current_page > 1" :href = "categories.prev_page_url" class="font-semibold text-blue-800 text-md bg-blue-50 hover:bg-indigo-100 rounded py-2 px-4 opacity-80">
                                &lt Prev
                            </Link>
                            <div v-else></div>
                            <Link v-if = "categories.current_page < categories.last_page" :href = "categories.next_page_url" class="font-semibold text-blue-800 text-md bg-blue-50 hover:bg-indigo-100 rounded py-2 px-4 opacity-80">
                                 Next >
                            </Link>
                            <div v-else></div>
                        </div>
                    </div>
            </div>
        </div>

        
    </AppLayout>
</template>
<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  jobs: Array,  // This will receive the jobs data passed from the controller
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Job Listings</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Loop through the jobs -->
                    <div v-for="job in jobs" :key="job.id" class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <img
                                :src="`/storage/${job.company_logo}`"
                                :alt="job.company_name"
                                class="h-16 w-16 rounded-full mr-4"
                            />
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">{{ job.company_name }}</h3>
                                <p class="text-sm text-gray-600">{{ job.title }}</p>
                            </div>
                        </div>

                        <p class="text-gray-700 mb-4">{{ job.description }}</p>
                        
                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Skills:</h4>
                            <!-- Loop through the skills array and display each skill -->
                            <div class="flex flex-wrap gap-2">
                                <span v-for="(skill, index) in job.skills" :key="index" class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ skill }}
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Location:</h4>
                            <p class="text-sm text-gray-600">{{ job.location }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Experience:</h4>
                            <p class="text-sm text-gray-600">{{ job.experience }}</p>
                        </div>

                        <div class="flex justify-between items-center">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Apply Now
                            </button>
                            <span class="text-sm text-gray-500">{{ job.created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

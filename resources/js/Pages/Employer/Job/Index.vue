<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-10">
            <div class="flex justify-between items-center">
                <p class="mb-10 text-5xl font-bold text-blue-700">All Job Listings</p>
                <breeze-link :href="route('employer_job_create')" class="py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" height="24" width="24" class="mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>New Listing
                </breeze-link>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500">Title</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500">Created</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="job in jobs" :key="job.id">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            {{ job.title }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ job.created_at }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <span class="inline-block rounded-xl text-white bg-green-500 px-3 py-1 text-xs mr-3 uppercase" v-if="job.status === 2">Draft</span>
                            <span class="inline-block rounded-xl text-white bg-blue-900 px-3 py-1 text-xs mr-3 uppercase" v-if="job.status === 1">Published</span>
                            <span class="inline-block rounded-xl text-white bg-red-900 px-3 py-1 text-xs mr-3 uppercase" v-if="job.status === 2">Expired</span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex justify-end space-x-3">
                                <breeze-link :href="route('employer_job_edit', [job.id])" :classes="'px-5 border-blue-500 border text-blue-500 rounded-xl transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none'">Details</breeze-link>
                                <breeze-link :href="route('employer_job_edit', [job.id])" :classes="'px-5 border-blue-500 border text-blue-500 rounded-xl transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none'">Edit</breeze-link>
                                <breeze-link @click="onClickDelete(job.id)" :classes="'px-5 border-blue-500 border text-blue-500 rounded-xl transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none'">Delete</breeze-link>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="jobs">
                        <td colspan="4">
                            <p class="text-xl py-4 text-center">
                                No listing available. <inertia-link :href="route('employer_job_create')" class="text-blue-900 font-bold underline">Start here.</inertia-link>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import BreezeLink from "@/Components/Link";

export default {
    layout: Authenticated,
    components: {
        BreezeLink
    },
    props: {
        jobs: Array
    },
    methods: {
        onClickDelete(id) {
            this.$inertia.form().delete(this.route('employer_job_delete', [id]), {
                onFinish: () => console.log('job deleted')
            });
        }
    }
}
</script>

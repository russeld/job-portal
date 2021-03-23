<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-10">
            <p class="my-10 text-5xl font-bold text-blue-700">All Job Listings</p>
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
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            Job Title 1
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">March 1, 2020</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Job Title 1</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex justify-end space-x-3">
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Analytics</button>
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Edit</button>
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Job Title 1</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">March 1, 2020</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Job Title 1</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex justify-end space-x-3">
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Analytics</button>
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Edit</button>
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Job Title 1</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">March 1, 2020</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Job Title 1</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex justify-end space-x-3">
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Analytics</button>
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Edit</button>
                                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";

export default {
    layout: Authenticated
}
</script>

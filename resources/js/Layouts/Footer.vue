<template>
    <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
        <nav class="hidden md:flex space-x-10">
            <inertia-link
                :href="route('privacy')"
                class="text-base font-medium text-gray-500 hover:text-gray-900">
                Privacy Policy
            </inertia-link>

            <inertia-link
                :href="route('terms')"
                class="text-base font-medium text-gray-500 hover:text-gray-900">
                Terms of Use
            </inertia-link>
        </nav>
    </div>
</template>

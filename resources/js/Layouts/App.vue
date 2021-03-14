<template>
    <div class="min-h-screen bg-white">
        <div class="lg:max-w-7xl mx-auto px-4 sm:px-6">
            <app-header />
            <main>
                <slot />
            </main>
            <app-footer />
        </div>
    </div>
</template>

<script>
import AppHeader from "./Header";
import AppFooter from "./Footer";

export default {
    components: {
        AppHeader,
        AppFooter
    }
}
</script>

<template>
    <div class="min-h-screen bg-white">
        <div class="lg:max-w-7xl mx-auto px-4 sm:px-6">
            <Header />
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<script>
    import Header from "./Header";
    export default {
        components: {
            Header,
        }
    }
</script>

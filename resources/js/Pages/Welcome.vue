<template>
    <guest>
        This is home
    </guest>
</template>
<script>
    import Guest from "../Layouts/Guest";
    export default {
        components: { Guest },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },
        data () {
            return {
                open: false
            }
        }
    }
</script>

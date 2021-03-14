<template>
    <div class="mx-auto sm:max-w-lg pt-20">
        <p class="font-semibold text-center text-5xl">Start looking for work</p>
        <p class="font-regular text-center mt-5">Create a <span class="font-semibold">jobseeker</span> account</p>
        <div class=" w-full mt-6 px-6 py-4 bg-white md:shadow-md overflow-hidden sm:rounded-lg">
            <breeze-validation-errors class="mb-4" />
            <form @submit.prevent="submit">
                <div>
                    <breeze-label for="name" value="Name" />
                    <breeze-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <breeze-label for="email" value="Email" />
                    <breeze-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <breeze-label for="password" value="Password" />
                    <breeze-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <breeze-label for="password_confirmation" value="Confirm Password" />
                    <breeze-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Already registered?
                    </inertia-link>

                    <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </breeze-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import AppLayout from "@/Layouts/App"

    import BreezeButton from '@/Components/Button'
    import BreezeCheckbox from "@/Components/Checkbox";
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'
    import BreezeApplicationLogo from '@/Components/ApplicationLogo'

    export default {
        layout: AppLayout,

        components: {
            BreezeApplicationLogo,
            BreezeButton,
            BreezeCheckbox,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('candidate_register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>

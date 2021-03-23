<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-10">
            <p class="my-10 text-5xl font-bold text-blue-700">New Job Listing</p>
            <div class="max-w-6xl">
                <form @submit.prevent="submit" class="space-y-md">
                    <div>
                        <breeze-label for="title" value="Job Title" />
                        <breeze-input id="title" type="text" class="mt-1 block lg:w-1/2" v-model="form.title" required autofocus />
                    </div>

                    <div class="mt-4">
                        <breeze-label for="type" value="Type" />
                        {{ form.type }}
                        <select
                            v-model="form.type"
                            class="appearance-none mt-1 block lg:w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="null">Select Your Beverage</option>
                            <option v-for="(type, id) in types" :key="id" :value="type.id">{{type.label}}</option>
                        </select>
                    </div>

                    <div class="flex lg:w-1/2 space-x-3">
                        <div class="mt-4 flex-1">
                            <breeze-label for="min_salary" value="Minimum Salary" />
                            <breeze-input id="min_salary" type="text" class="mt-1 block w-full" v-model="form.min_salary" required autofocus />
                        </div>

                        <div class="mt-4 flex-1">
                            <breeze-label for="max_salary" value="Max Salary" />
                            <breeze-input id="max_salary" type="text" class="mt-1 block w-full" v-model="form.max_salary" required autofocus />
                        </div>
                    </div>

                    <div class="mt-4">
                        <breeze-label for="description" value="Description" />
                        <textarea rows="10" v-model="form.description" required class="autoexpand resize-y mt-1 block lg:w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"/>
                    </div>

                    <div class="mt-4">
                        <breeze-button class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Publish
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import BreezeButton from '@/Components/Button'
import BreezeInput from '@/Components/Input'
import BreezeCheckbox from '@/Components/Checkbox'
import BreezeLabel from '@/Components/Label'
import BreezeValidationErrors from '@/Components/ValidationErrors'

export default {
    layout: Authenticated,
    components: {
        BreezeButton,
        BreezeInput,
        BreezeCheckbox,
        BreezeLabel,
        BreezeValidationErrors
    },
    props: {
      types: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                max_salary: '',
                min_salary: '',
                description: '',
                type: '',
                remember: false
            })
        }
    },
}
</script>

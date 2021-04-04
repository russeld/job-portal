<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-10">
            <div class="max-w-6xl">
                <div class="my-10 flex items-center justify-between w-full lg:w-1/2">
                    <span class="text-5xl font-bold text-blue-700">{{ job.title }}</span>
                </div>
                <breeze-validation-errors class="mb-4" />
                {{ errors }}
                <form @submit.prevent="submit" class="space-y-md">
                    <div>
                        <breeze-label for="title" value="Job Title" />
                        <breeze-input id="title" type="text" class="mt-1 block w-full lg:w-1/2" v-model="form.title" required autofocus />
                    </div>

                    <div class="mt-4">
                        <breeze-label for="industry" value="Industry" />
                        <select
                            id="industry"
                            v-model="form.industry_id"
                            required
                            class="appearance-none mt-1 block w-full lg:w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option v-for="(industry, id) in industries" :key="id" :value="industry.id">{{industry.name}}</option>
                        </select>
                    </div>

                    <div class="flex flex-col md:flex-row w-full md:w-full lg:w-1/2 md:space-x-3">
                        <div class="mt-4 flex-1">
                            <breeze-label for="opening" value="Openings" />
                            <breeze-input id="opening" type="text" class="mt-1 block w-full" v-model="form.opening" required autofocus />
                        </div>
                        <div class="mt-4 flex-1">
                            <breeze-label for="type" value="Type" />
                            <select
                                v-model="form.type"
                                class="appearance-none mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option v-for="(type, id) in types" :key="id" :value="type.id">{{type.label}}</option>
                            </select>
                        </div>
                    </div>


                    <div class="flex flex-col md:flex-row w-full md:w-full lg:w-1/2 md:space-x-3">
                        <div class="mt-4 flex-1">
                            <breeze-label for="type" value="Start Date" />
                            <breeze-input id="start_date" type="date" class="mt-1 block w-full" v-model="form.start_date" required />
                        </div>
                        <div class="mt-4 flex-1">
                            <breeze-label for="type" value="Duration" />
                            <select
                                v-model="form.duration"
                                class="appearance-none mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option v-for="(duration, id) in durations" :key="id" :value="duration.value">{{duration.label}}</option>
                            </select>
                        </div>
                    </div>


                    <div class="flex flex-col md:flex-row w-full md:w-full lg:w-1/2 md:space-x-3">
                        <div class="mt-4 flex-1">
                            <breeze-label for="min_salary" value="Minimum Salary" />
                            <breeze-input id="min_salary" type="text" class="mt-1 block w-full" v-model="form.min_salary" required />
                        </div>

                        <div class="mt-4 flex-1">
                            <breeze-label for="max_salary" value="Max Salary" />
                            <breeze-input id="max_salary" type="text" class="mt-1 block w-full" v-model="form.max_salary" required />
                        </div>
                    </div>

                    <div class="mt-4">
                        <breeze-label for="description" value="Description" />
                        <textarea rows="10" v-model="form.description" required class="autoexpand resize-y mt-1 block w-full lg:w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"/>
                    </div>

                    <div class="mt-4 space-x-3">
                        <breeze-button
                            name="status"
                            type="submit"
                            @click="form.status = 2"
                            class="bg-green-900 hover:bg-green-800"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Save Draft
                        </breeze-button>
                        <breeze-button
                            name="status"
                            type="submit"
                            @click="form.status = 1"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Publish
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated"
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
        job: {
            type: Object,
            required: true
        },
        types: Array,
        industries: Array,
        durations: Array
    },
    data() {
        return {
            form: this.$inertia.form({...this.job})
        }
    },
    methods: {
        submit() {
            this.form.put(this.route('employer_job_edit', [this.job.id]), {
                onFinish: () => console.log('updated'),
            })
        }
    }
}
</script>

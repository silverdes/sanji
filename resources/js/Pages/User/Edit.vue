<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add new User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form>
                        <div class="mt-10 sm:mt-0 px-10 py-5">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                    Use a permanent address where you can receive mail.
                                    </p>
                                </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit="updateProfileInformation">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="full_name" class="block text-sm font-medium text-gray-700">Full name</label>
                                                <input v-model="form.full_name" type="text" name="full_name" id="full_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <jet-input-error :message="form.errors.full_name" class="mt-2" />

                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                                <input v-model="form.email" type="text" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                                <input v-model="form.password" type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                                <input v-model="form.title" type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="sub_title" class="block text-sm font-medium text-gray-700">Sub Title</label>
                                                <input v-model="form.sub_title" type="text" name="sub_title" id="sub_title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                                <input v-model="form.role" type="text" name="role" id="role" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                                <input v-model="form.status" type="text" name="status" id="status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save
                                        </button>
                                    </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetInputError from '@/Jetstream/InputError'

    export default {
        components: {
            AppLayout,
            JetInputError,
        },
        props:{
            user:Object,
        },
        data(){
            return{
                form: this.$inertia.form({
                    _method: 'PUT',
                    full_name:this.user.name,
                    email:this.user.email,
                    password:this.user.password,
                    title:this.user.title,
                    sub_title:this.user.sub_title,
                    role:this.user.role,
                    status:this.user.status,
                }),
                
            }
        },
        methods:{
            updateProfileInformation() {
                this.form.post(route('users.update'), {
                    preserveScroll: true,
                });
            },

        }
    }
</script>

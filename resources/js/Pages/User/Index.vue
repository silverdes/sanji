<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">
                Welcome <span class="text-green-400"> {{$attrs.user.name}} </span>
            
            <inertia-link class="float-right" :href="route('users.create')" v-if="$attrs.permissions.users.create" >
                    <jet-button> 
                        <div class="flex items-center space-x-1">
                            <i class="icofont-plus-square"></i>
                            <span>
                                Create 
                            </span>
                        </div>
                        </jet-button>
                </inertia-link>
                </h2>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="user in users" :key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" :src="user.profile_photo_url" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">
                                            {{user.name}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                            {{user.email}}
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-semibold">{{user.title}}</div>
                                        <div class="text-sm text-gray-500">{{user.sub_title}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" v-if="user.status == '1'">Active</span>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-600" v-else>Pending</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span v-if="user.role == '1'">Admin</span>
                                        <span v-else>User</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center w-2/3 justify-between">
                                            <inertia-link :href="route('users.show', user.id)" class="text-gray-700 text-lg hover:text-gray-500">
                                                <i class="icofont-eye"></i>
                                            </inertia-link>
                                            |
                                            <inertia-link v-if="user.can.update" :href="route('users.edit', user.id)" class="text-gray-700 text-lg hover:text-gray-500">
                                                <i class="icofont-edit-alt"></i>
                                            </inertia-link>
                                        </div>
                                    </td>
                                    </tr>

                                    <!-- More people... -->
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'

    export default {
        components: {
            AppLayout,
            JetButton
        },
        props:{
            users:Object,
        },
        computed:{
            reversedMessage: function () {
            // `this` points to the vm instance
            return this.users.map( (id) => {
                id.role
                return id
            })
            }
        },
        methods:{
            fullName: function(name) {
                if(name.role != true){
                    return name.role = "Admin"
                }else{
                    return name.role = "User"
                }
        }
    }
}
</script>

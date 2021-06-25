<template>
<app-layout>
    <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <jet-form-section class="" @submitted="updateProfileInformation">
            <template #title>
                Profile Information
            </template>

            <template #description>
                Update your account's profile information and email address.
            </template>

            <template #form>
                <!-- Name -->
                <div class="col-span-6 sm:col-span-3">
                    <jet-label for="name" value="Name" />
                        <div class="relative">
                        <jet-input id="name" type="text" class="mt-1 block w-full" :class="{'border-red-400':form.errors.name}" v-model="form.name" autocomplete="name" />
                            <div class="absolute bottom-2 right-2">
                                <i v-if="!form.errors.name" class="icofont-check-circled text-green-400"></i>
                                <i v-if="form.errors.name" class="icofont-info-circle text-red-400"></i>
                            </div>
                        </div>
                    <jet-input-error :message="form.errors.name" class="mt-2" />
                </div>
                <!-- Email -->
                <div class="col-span-6 sm:col-span-3">
                    <jet-label for="email" value="Email" />
                    <div class="relative">
                        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" :class="{'border-red-400':form.errors.email}" />
                        <div class="absolute bottom-2 right-2">
                            <i v-if="!form.errors.email" class="icofont-check-circled text-green-400"></i>
                            <i v-if="form.errors.email" class="icofont-info-circle text-red-400"></i>
                        </div>
                    </div>
                    <jet-input-error :message="form.errors.email" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3 relative">
                    <jet-label for="title" value="Title" />
                    <div class="relative">
                        <jet-input v-model="form.title" type="text" name="title" id="title" class="mt-1 block w-full" :class="{'border-red-400':form.errors.title}" />
                        <div class="absolute bottom-2 right-2">
                            <i v-if="!form.errors.title" class="icofont-check-circled text-green-400"></i>
                            <i v-if="form.errors.title" class="icofont-info-circle text-red-400"></i>
                        </div>
                    </div>
                    <jet-input-error :message="form.errors.title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3 relative">
                    <jet-label for="sub_title" value="Sub Title" />
                    <div class="relative">
                        <jet-input v-model="form.sub_title" type="text" name="sub_title" class="mt-1 block w-full" :class="{'border-red-400':form.errors.sub_title}" />
                        <div class="absolute bottom-2 right-2">
                            <i v-if="!form.errors.sub_title" class="icofont-check-circled text-green-400"></i>
                            <i v-if="form.errors.sub_title"  class="icofont-info-circle text-red-400"></i>
                        </div>
                    </div>
                    <jet-input-error :message="form.errors.sub_title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2 relative">
                    <jet-label for="role" value="Role" />
                    <div class="flex items-center">
                        <span class="mr-3">Is he an admin ?</span>
                        <jet-checkbox :checked="user.role =='1' " v-model="form.role" />
                    </div>
                     
                    <jet-input-error :message="form.errors.role" class="mt-2" />
                </div>
                
                <div class="col-span-6 sm:col-span-3 lg:col-span-2 relative">
                    <jet-label for="status" value="Status" />
                    <div class="flex items-center">
                        <span class="mr-3">Activate the account ?</span>
                        <jet-checkbox :checked="user.status =='1' " v-model="form.status" />
                    </div>
                     <jet-input-error :message="form.errors.status" class="mt-2" />
                </div>
            </template>

            <template #actions>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Saved.
                </jet-action-message>

                <inertia-link href="/users" class="mx-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Cancel
                </inertia-link>
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </jet-button>
            </template>
            </jet-form-section>
        </div>
     </div>
    </div>
</app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetCheckbox from '@/Jetstream/Checkbox'

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetCheckbox,
        },
        props:{
            user:Object,
        },
        data(){
            return{
                form: this.$inertia.form({
                    _method: 'PUT',
                    name:this.user.name,
                    email:this.user.email,
                    title:this.user.title,
                    sub_title:this.user.sub_title,
                    role:this.user.role,
                    status:this.user.status,
                }),
                
            }
        },
        methods:{
            updateProfileInformation() {
                this.form.post(route('users.update', this.user.id), {
                    preserveScroll: true,
                });
            },
        },
}
</script>

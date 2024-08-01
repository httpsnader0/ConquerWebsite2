<template>

	<AppHead :title="$t('Login')" />

	<div class="flex flex-col justify-center items-center text-center gap-1 mb-8">
		<span class="text-3xl text-primary font-bold">{{ $t('Login') }}</span>
		<span class="text-gray-400">{{ $t('Please Enter Email Address And Password') }}</span>
	</div>

	<form @submit.prevent="submit">

		<FormInput
			:label="$t('Email Address')"
			:form="form"
			name="email"
			required
		/>

		<FormPassword
			:label="$t('Password')"
			:form="form"
			name="password"
			required
		/>

		<SubmitButton
			:label="$t('Login')"
			:loading="form.processing"
			class="w-full"
		/>

	</form>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormInput from '@/Components/Form/FormInput.vue';
	import FormPassword from '@/Components/Form/FormPassword.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';

	const form = useForm({
		email: null,
		password: null,
	});

	const submit = () => {
		form.post(route('dashboard.login.store'));
	};

</script>
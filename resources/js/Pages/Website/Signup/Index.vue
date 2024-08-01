<template>

	<AppHead title="Signup" />

	<div class="bg-white p-10 mb-20 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">
		<form @submit.prevent="submit">

			<FormInput
				:label="$t('Username')"
				:form="form"
				name="username"
				required
			/>

			<FormInput
				:label="$t('Email Address')"
				:form="form"
				name="email"
				required
			/>

			<div class="grid grid-cols-2 gap-5">

				<FormPassword
					:label="$t('Password')"
					:form="form"
					name="password"
					required
					feedback
				/>

				<FormPassword
					:label="$t('Password Confirmation')"
					:form="form"
					name="password_confirmation"
					required
				/>

			</div>

			<FormRecaptcha
				:form="form"
				name="recaptcha"
			/>

			<SubmitButton
				:label="$t('Create Account')"
				class="w-full"
				:loading="form.processing"
				:disabled="!form.recaptcha"
			/>

		</form>
	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import { useForm } from "@inertiajs/vue3";
	import FormInput from "@/Components/Form/FormInput.vue";
	import FormPassword from "@/Components/Form/FormPassword.vue";
	import FormRecaptcha from '@/Components/Form/FormRecaptcha.vue';
	import SubmitButton from "@/Components/Button/SubmitButton.vue";

	const form = useForm({
		username: null,
		email: null,
		password: null,
		password_confirmation: null,
		recaptcha: null,
	});

	const submit = () => {
		form.post(route('website.signup.store'), {
			onSuccess: () => form.reset(),
			onError: () => form.reset('recaptcha'),
		});
	};

</script>
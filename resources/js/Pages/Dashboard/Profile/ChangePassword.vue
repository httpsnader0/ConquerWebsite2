<template>

	<AppHead :title="$t('Change Password')" />

	<Panel :title="$t('Change Password')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormPassword
					:label="$t('Current Password')"
					:form="form"
					name="current_password"
					required
				/>

				<FormPassword
					:label="$t('New Password')"
					:form="form"
					name="new_password"
					required
					feedback
				/>

				<FormPassword
					:label="$t('New Password Confirmation')"
					:form="form"
					name="new_password_confirmation"
					required
				/>

				<SubmitButton
					:label="$t('Save')"
					:loading="form.processing"
				/>

			</div>

		</form>

	</Panel>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Panel from '@/Components/Shared/Panel.vue';
	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormPassword from '@/Components/Form/FormPassword.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';

	const form = useForm({
		current_password: null,
		new_password: null,
		new_password_confirmation: null,
	});

	const submit = () => {
		form.post(route('dashboard.profile.change-password.update'), {
			onSuccess: () => form.reset(),
		});
	};

</script>
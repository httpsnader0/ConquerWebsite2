<template>

	<AppHead :title="$t('Profile')" />

	<Panel :title="$t('Profile')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

					<FormInput
						:label="$t('Name')"
						:form="form"
						name="name"
						required
					/>

					<FormInput
						:label="$t('Email Address')"
						:form="form"
						name="email"
						required
					/>

				</div>

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
	import { usePage, useForm } from '@inertiajs/vue3';
	import FormInput from '@/Components/Form/FormInput.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';

	const form = useForm({
		name: usePage().props.auth?.name,
		email: usePage().props.auth?.email,
	});

	const submit = () => {
		form.post(route('dashboard.profile.update'));
	};

</script>
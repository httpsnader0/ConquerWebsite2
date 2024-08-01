<template>

	<AppHead :title="$t('_Settings.Download')" />

	<Panel :title="$t('_Settings.Download')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<Divider
					align="left"
					type="solid"
				>
					<Badge
						:value="$t('Client')"
						severity="secondary"
					/>
				</Divider>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-5">

					<FormInput
						:label="$t('Url')"
						:form="form"
						name="client_url"
						required
					/>

					<FormInput
						:label="$t('Size')"
						:form="form"
						name="client_size"
						required
					/>

					<FormInput
						:label="$t('Release Date')"
						:form="form"
						name="client_release_date"
						required
					/>

				</div>

				<Divider
					align="left"
					type="solid"
				>
					<Badge
						:value="$t('Patch')"
						severity="secondary"
					/>
				</Divider>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-5">

					<FormInput
						:label="$t('Url')"
						:form="form"
						name="patch_url"
						required
					/>

					<FormInput
						:label="$t('Size')"
						:form="form"
						name="patch_size"
						required
					/>

					<FormInput
						:label="$t('Release Date')"
						:form="form"
						name="patch_release_date"
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

	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormInput from '@/Components/Form/FormInput.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import Divider from 'primevue/divider';

	const props = defineProps({
		client: String,
		patch: Object,
	});

	const form = useForm({
		client_url: props.client.url,
		client_size: props.client.size,
		client_release_date: props.client.release_date,
		patch_url: props.patch.url,
		patch_size: props.patch.size,
		patch_release_date: props.patch.release_date,
	});

	const submit = () => {
		form.post(route('dashboard.settings.download.update'));
	};

</script>

<template>

	<AppHead :title="$t('_Settings.Index')" />

	<Panel :title="$t('_Settings.Index')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormTranslatable
					:label="$t('Title')"
					:form="form"
					name="title"
					required
				/>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

					<FormFile
						:label="$t('Icon')"
						:form="form"
						name="icon"
						:src="asset(icon)"
					/>

					<FormFile
						:label="$t('Logo')"
						:form="form"
						name="logo"
						:src="asset(logo)"
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
	import FormTranslatable from '@/Components/Form/FormTranslatable.vue';
	import FormFile from '@/Components/Form/FormFile.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';

	const props = defineProps({
		title: Object,
		icon: String,
		logo: String,
	});

	const form = useForm({
		title: props.title ?? { 'ar': '', 'en': '' },
		icon: null,
		logo: null,
	});

	const submit = () => {
		form.post(route('dashboard.settings.update'));
	};

</script>

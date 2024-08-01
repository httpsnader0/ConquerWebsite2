<template>

	<AppHead :title="$t('_Settings.Installations')" />

	<Panel :title="$t('_Settings.Installations')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<template
					v-for="(installation, index) in installations"
					:key="index"
				>

					<Divider
						align="left"
						type="solid"
					>
						<Badge
							:value="$t('Installation') + ' ' + (index + 1)"
							severity="secondary"
						/>
					</Divider>

					<FormTranslatable
						:label="$t('Title')"
						:form="form"
						name="title"
						required
						hasRepeated
						field="installation"
						:index="index"
					/>

				</template>

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
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import Divider from 'primevue/divider';
	import { onBeforeMount } from 'vue';

	const props = defineProps({
		installations: Object,
	});

	const form = useForm({
		installation: [],
	});

	onBeforeMount(() => {

		props.installations.forEach((installation, index) => {
			form['installation'][index] = {
				title: { ar: installation.title['ar'] ?? '', en: installation.title['en'] ?? '' },
			};
		});

	});

	const submit = () => {
		form.post(route('dashboard.settings.installations.update'));
	};

</script>

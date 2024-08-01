<template>

	<AppHead :title="$t('_Settings.Game Features')" />

	<Panel :title="$t('_Settings.Game Features')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<template
					v-for="(feature, index) in features"
					:key="index"
				>

					<Divider
						align="left"
						type="solid"
					>
						<Badge
							:value="$t('Feature') + ' ' + (index + 1)"
							severity="secondary"
						/>
					</Divider>

					<FormFile
						:label="$t('Image')"
						:form="form"
						name="image"
						:src="asset(feature.image)"
						hasRepeated
						field="feature"
						:index="index"
					/>

					<FormTranslatable
						:label="$t('Title')"
						:form="form"
						name="title"
						required
						hasRepeated
						field="feature"
						:index="index"
					/>

					<FormTranslatable
						:label="$t('Description')"
						:form="form"
						name="description"
						required
						hasRepeated
						field="feature"
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
	import FormFile from '@/Components/Form/FormFile.vue';
	import FormTranslatable from '@/Components/Form/FormTranslatable.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import Divider from 'primevue/divider';
	import { onBeforeMount } from 'vue';

	const props = defineProps({
		features: Object,
	});

	const form = useForm({
		feature: [],
	});

	onBeforeMount(() => {

		props.features.forEach((feature, index) => {
			form['feature'][index] = {
				image: null,
				title: { ar: feature.title['ar'] ?? '', en: feature.title['en'] ?? '' },
				description: { ar: feature.description['ar'] ?? '', en: feature.description['en'] ?? '' },
			};
		});

	});

	const submit = () => {
		form.post(route('dashboard.settings.features.update'));
	};

</script>

<template>

	<AppHead :title="$t('_Settings.About Game')" />

	<Panel :title="$t('_Settings.About Game')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormInput
					:label="$t('Video')"
					:form="form"
					name="video"
					required
				/>

				<template
					v-for="(about, index) in abouts"
					:key="index"
				>

					<FormTranslatable
						:label="$t('Title')"
						:form="form"
						name="title"
						required
						hasRepeated
						field="about"
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
	import FormInput from '@/Components/Form/FormInput.vue';
	import FormTranslatable from '@/Components/Form/FormTranslatable.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { onBeforeMount } from 'vue';

	const props = defineProps({
		video: String,
		abouts: Object,
	});

	const form = useForm({
		video: props.video,
		about: [],
	});

	onBeforeMount(() => {

		props.abouts.forEach((about, index) => {
			form['about'][index] = {
				title: { ar: about.title['ar'] ?? '', en: about.title['en'] ?? '' },
			};
		});

	});

	const submit = () => {
		form.post(route('dashboard.settings.about.update'));
	};

</script>

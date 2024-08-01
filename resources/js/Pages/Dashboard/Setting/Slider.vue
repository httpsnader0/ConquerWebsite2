<template>

	<AppHead :title="$t('_Settings.Sliders')" />

	<Panel :title="$t('_Settings.Sliders')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<template
					v-for="(slider, index) in sliders"
					:key="index"
				>

					<Divider
						align="left"
						type="solid"
					>
						<Badge
							:value="$t('Slider') + ' ' + (index + 1)"
							severity="secondary"
						/>
					</Divider>

					<FormFile
						:label="$t('Image')"
						:form="form"
						name="image"
						:src="asset(slider.image)"
						hasRepeated
						field="slider"
						:index="index"
					/>

					<FormTranslatable
						:label="$t('Text')"
						:form="form"
						name="text"
						required
						hasRepeated
						field="slider"
						:index="index"
					/>

					<FormInput
						:label="$t('Url')"
						:form="form"
						name="url"
						required
						hasRepeated
						field="slider"
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
	import FormInput from '@/Components/Form/FormInput.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import Divider from 'primevue/divider';
	import { onBeforeMount } from 'vue';

	const props = defineProps({
		sliders: Object,
	});

	const form = useForm({
		slider: [],
	});

	onBeforeMount(() => {

		props.sliders.forEach((slider, index) => {
			form['slider'][index] = {
				image: null,
				text: { ar: slider.text['ar'] ?? '', en: slider.text['en'] ?? '' },
				url: slider.url,
			};
		});

	});

	const submit = () => {
		form.post(route('dashboard.settings.sliders.update'));
	};

</script>

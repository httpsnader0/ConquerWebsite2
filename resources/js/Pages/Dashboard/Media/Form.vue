<template>

	<AppHead :title="isEmpty(model) ? $t('_Media.Create') : $t('_Media.Edit')" />

	<Panel :title="isEmpty(model) ? $t('_Media.Create') : $t('_Media.Edit')">

		<template #actions>

			<ActionButton
				:ability="Ability.MEDIA_INDEX"
				:label="$t('_Media.Index')"
				:href="route('dashboard.media.index')"
			/>

		</template>

		<Tabs
			v-if="!isEmpty(model)"
			:model="model"
		/>

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormFile
					:label="$t('Image')"
					:form="form"
					name="image"
					:src="model?.image"
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

	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormFile from '@/Components/Form/FormFile.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { Ability } from '@/Classes/Ability';

	const props = defineProps({
		model: Object,
	});

	const form = useForm({
		image: null,
	});

	const submit = () => {
		form.post(!Object.keys(props.model).length ? route('dashboard.media.store') : route('dashboard.media.update', props.model?.id));
	};

</script>

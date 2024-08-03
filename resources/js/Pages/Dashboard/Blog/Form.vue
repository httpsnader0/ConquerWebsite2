<template>

	<AppHead :title="isEmpty(model) ? $t('_Blogs.Create') : $t('_Blogs.Edit')" />

	<Panel :title="isEmpty(model) ? $t('_Blogs.Create') : $t('_Blogs.Edit')">

		<template #actions>

			<ActionButton
				:ability="Ability.BLOGS_INDEX"
				:label="$t('_Blogs.Index')"
				:href="route('dashboard.blogs.index')"
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

				<FormTranslatable
					:label="$t('Name')"
					:form="form"
					name="name"
					required
				/>

				<FormTranslatableEditor
					:label="$t('Content')"
					:form="form"
					name="content"
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

	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormFile from '@/Components/Form/FormFile.vue';
	import FormTranslatable from '@/Components/Form/FormTranslatable.vue';
	import FormTranslatableEditor from '@/Components/Form/FormTranslatableEditor.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { Ability } from '@/Classes/Ability';

	const props = defineProps({
		model: Object,
	});

	const form = useForm({
		image: null,
		name: props.model?.translation?.name ?? { ar: '', en: '' },
		content: props.model?.translation?.content ?? { ar: '', en: '' },
	});

	const submit = () => {
		form.post(!Object.keys(props.model).length ? route('dashboard.blogs.store') : route('dashboard.blogs.update', props.model?.slug));
	};

</script>

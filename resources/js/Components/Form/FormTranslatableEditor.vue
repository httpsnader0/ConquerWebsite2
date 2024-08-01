<template>

	<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

		<template
			v-for="locale in ['ar','en']"
			:key="locale"
		>
			<div class="flex flex-col">

				<Label
					:label="label"
					:form="form"
					:name="name"
					:required="required"
					:locale="locale === 'ar' ? 'Arabic' : 'English'"
				/>

				<QuillEditor
					theme="snow"
					contentType="html"
					:toolbar="[
						{ 'header': [1, 2, 3, 4, 5, 6, false] },
						{ 'color': [] }, { 'background': [] },
						'bold', 'italic', 'underline',
						{ 'list': 'ordered'}, { 'list': 'bullet' },
						'link', 'image',
						'blockquote', 'code-block',
						'clean',
					]"
					v-model:content="form[name][locale]"
					class="min-h-[200px] max-h-[200px]"
					:class="locale == 'ar' ? 'ql-rtl' : 'ql-ltr'"
				/>

				<Error
					:form="form"
					:name="name"
					:locale="locale"
				/>

			</div>
		</template>

	</div>

</template>

<script setup>

	import { QuillEditor } from '@vueup/vue-quill'
	import '@vueup/vue-quill/dist/vue-quill.snow.css';
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
	});

</script>
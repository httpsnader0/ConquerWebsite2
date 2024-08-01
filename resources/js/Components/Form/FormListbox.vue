<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
			:asDiv="true"
		/>

		<Listbox
			v-model="form[name]"
			:options="options"
			:option-label="optionLabel"
			:option-value="optionValue"
			class="w-full"
			listStyle="max-height: 250px"
			filter
			v-bind="$attrs"
		/>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import Listbox from 'primevue/listbox';
	import Label from './Label.vue';
	import Error from './Error.vue';

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		placeholder: String,
		required: Boolean,
		options: Array,
		optionLabel: {
			type: String,
			default: "name",
		},
		optionValue: {
			type: String,
			default: "value",
		},
		hideLabel: Boolean,
	});

</script>

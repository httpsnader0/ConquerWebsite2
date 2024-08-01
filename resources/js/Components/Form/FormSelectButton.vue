<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<SelectButton
			v-model="form[name]"
			:options="options"
			:option-label="optionLabel"
			:option-value="optionValue"
		/>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import SelectButton from 'primevue/selectbutton';
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		options: Array,
		optionLabel: {
			type: String,
			default: "name",
		},
		optionValue: {
			type: String,
			default: "value",
		},
	});

</script>

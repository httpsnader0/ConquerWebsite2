<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<InputText
			v-if="hasRepeated"
			:id="name"
			v-model="form[field][index][name]"
			type="number"
			class="w-full"
			:min="min"
			:max="max"
			:step="step"
			v-bind="$attrs"
			autocomplete="off"
		/>

		<InputText
			v-else
			:id="name"
			v-model="form[name]"
			type="number"
			class="w-full"
			:min="min"
			:max="max"
			:step="step"
			v-bind="$attrs"
			autocomplete="off"
		/>

		<Error
			:form="form"
			:name="name"
			:hasRepeated="hasRepeated"
			:field="field"
			:index="index"
		/>

	</div>

</template>

<script setup>

	import InputText from "primevue/inputtext";
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		min: {
			type: Number,
			default: 0,
		},
		max: {
			type: Number,
			default: 9999999999,
		},
		step: {
			type: Number,
			default: 1,
		},
		hasRepeated: {
			type: Boolean,
			default: false,
		},
		field: {
			type: String,
			default: '',
		},
		index: {
			type: Number,
			default: 0,
		},
	});

</script>

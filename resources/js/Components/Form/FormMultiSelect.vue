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

		<MultiSelect
			v-if="!hideLabel"
			v-model="form[name]"
			:options="options"
			:filter="filterable"
			:option-label="optionLabel"
			:option-value="optionValue"
			:empty-filter-message="$t('There Is No Results')"
			:empty-message="$t('There Is No Option Founded')"
			:selected-items-label="$t('Selected Items', {count: '{0}'})"
			:placeholder="placeholder ? `${$t('Select')} ${placeholder}` : ''"
			:maxSelectedLabels="5"
			class="w-full"
			v-bind="$attrs"
		/>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import MultiSelect from "primevue/multiselect";
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		placeholder: String,
		required: Boolean,
		clearable: Boolean,
		filterable: Boolean,
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

<template>

	<div class="flex flex-col">

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<Chips
			v-model="form[name]"
			:allowDuplicate="allowDuplicate"
			v-bind="$attrs"
			:pt="{
				container: { class: 'w-full' },
				token: { class: 'my-1' },
				input: { class: 'ltr:ml-2 rtl:mr-2' },
			}"
		/>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import Chips from 'primevue/chips';
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		allowDuplicate: {
			type: Boolean,
			default: false,
		},
	});

</script>

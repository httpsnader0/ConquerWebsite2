<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<div class="flex flex-wrap gap-5">

			<div
				v-for="type in types"
				:key="type"
				class="flex align-items-center gap-2"
			>

				<RadioButton
					v-model="form[name]"
					:name="name"
					:value="type.value"
					:inputId="type.label"
					v-bind="$attrs"
				/>

				<label
					:for="type.label"
					class="cursor-pointer"
				>
					{{ type.label }}
				</label>

			</div>

		</div>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import RadioButton from "primevue/radiobutton";
	import Label from "./Label.vue";
	import Error from "./Error.vue";
	import { computed } from "vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		value: String,
		types: Object,
		required: Boolean,
		hideLabel: Boolean,
	});

</script>

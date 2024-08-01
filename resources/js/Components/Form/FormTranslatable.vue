<template>

	<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

		<div>

			<Label
				:label="label"
				:form="form"
				:name="name"
				:required="required"
				locale="Arabic"
			/>

			<div v-if="hasRepeated">
				<Textarea
					v-if="textarea"
					rows="5"
					cols="30"
					v-model="form[field][index][name]['ar']"
					class="w-full"
					v-bind="$attrs"
					autocomplete="off"
				/>

				<InputText
					v-else
					:id="`${name}-Arabic`"
					type="text"
					v-model="form[field][index][name]['ar']"
					class="w-full"
					v-bind="$attrs"
					autocomplete="off"
				/>
			</div>

			<div v-else>
				<Textarea
					v-if="textarea"
					rows="5"
					cols="30"
					v-model="form[name]['ar']"
					class="w-full"
					v-bind="$attrs"
					autocomplete="off"
				/>

				<InputText
					v-else
					:id="`${name}-Arabic`"
					type="text"
					v-model="form[name]['ar']"
					class="w-full"
					v-bind="$attrs"
					autocomplete="off"
				/>
			</div>

			<Error
				:form="form"
				:name="name"
				locale="ar"
				:hasRepeated="hasRepeated"
				:field="field"
				:index="index"
			/>

		</div>

		<div>

			<Label
				:label="label"
				:form="form"
				:name="name"
				:required="required"
				locale="English"
			/>

			<template v-if="hasRepeated">

				<Textarea
					v-if="textarea"
					rows="5"
					cols="30"
					v-model="form[field][index][name]['en']"
					class="w-full"
					v-bind="$attrs"
				/>

				<InputText
					v-else
					:id="`${name}-English`"
					type="text"
					v-model="form[field][index][name]['en']"
					class="w-full"
					v-bind="$attrs"
				/>

			</template>

			<template v-else>

				<Textarea
					v-if="textarea"
					rows="5"
					cols="30"
					v-model="form[name]['en']"
					class="w-full"
					v-bind="$attrs"
				/>

				<InputText
					v-else
					:id="`${name}-English`"
					type="text"
					v-model="form[name]['en']"
					class="w-full"
					v-bind="$attrs"
				/>

			</template>

			<Error
				:form="form"
				:name="`${name}`"
				locale="en"
				:hasRepeated="hasRepeated"
				:field="field"
				:index="index"
			/>

		</div>

	</div>

</template>

<script setup>

	import InputText from "primevue/inputtext";
	import Textarea from "primevue/textarea";
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		textarea: Boolean,
		hideLabel: Boolean,
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

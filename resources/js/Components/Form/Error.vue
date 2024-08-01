<template>

	<template v-if="hasRepeated">
		<div
			v-if="form['errors'][`${field}.${index}.${name}`] || form['errors'][`${field}.${index}.${name}.${locale}`]"
			class="mt-3 capitalize"
		>

			<InlineMessage>
				{{ locale ? form['errors'][`${field}.${index}.${name}.${locale}`] : form['errors'][`${field}.${index}.${name}`] }}
			</InlineMessage>

		</div>
	</template>

	<template v-else>
		<div
			v-if="form['errors'][name] || form['errors'][`${name}.${locale}`]"
			class="mt-3 capitalize"
		>

			<InlineMessage>
				{{ locale ? form['errors'][`${name}.${locale}`] : form['errors'][name] }}
			</InlineMessage>

		</div>
	</template>

</template>

<script setup>

	import InlineMessage from 'primevue/inlinemessage';

	const props = defineProps({
		form: Object,
		name: String,
		locale: String,
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

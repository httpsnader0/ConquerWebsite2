<template>

	<div
		v-if="asDiv"
		class="mb-3 inline-block w-fit"
		:class="{ required: required }"
	>

		{{ label ?? $t(name) }}

		<span v-if="locale">( {{ $t(locale) }} )</span>

	</div>

	<label
		v-else-if="!hideLabel"
		:for="locale ? `${name}-${locale}` : name"
		:class="{ required: required }"
		class="mb-3 inline-block w-fit"
	>

		{{ label ?? $t(name) }}

		<span v-if="locale">( {{ $t(locale) }} )</span>

	</label>

</template>

<script setup>

	const props = defineProps({
		name: String,
		label: String,
		required: Boolean,
		hideLabel: Boolean,
		locale: String,
		asDiv: Boolean,
		hasRepeated: Boolean,
	});

</script>

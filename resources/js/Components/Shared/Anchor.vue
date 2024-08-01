<template>

	<div v-ability="ability">

		<Link
			v-if="href"
			:href="href"
			class="anchor-component"
			v-bind="$attrs"
		>
		{{ label }}
		</Link>

		<span v-else>{{ label }}</span>

	</div>

	<div v-else-ability="ability">

		<span>{{ label }}</span>

	</div>

</template>

<script setup>

	const props = defineProps({
		ability: String,
		label: String,
		href: String,
	});

</script>

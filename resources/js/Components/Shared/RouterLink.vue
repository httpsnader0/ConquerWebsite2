<template>

	<a
		v-if="to.href"
		v-ability="to.ability"
		:href="to.href"
		class="p-menuitem-link router-link"
		:class="{ active: to.active }"
	>

		<p
			class="p-menuitem-icon"
			:class="to.icon"
		>
		</p>

		<p class="p-menuitem-text">
			{{ to.label }}
		</p>

	</a>

	<Link
		v-else
		v-ability="to.ability"
		:href="to.link"
		class="p-menuitem-link router-link"
		:class="{ active: to.active }"
	>

	<p
		class="p-menuitem-icon"
		:class="to.icon"
	>
	</p>

	<p class="p-menuitem-text">
		{{ to.label }}
	</p>

	</Link>

</template>

<script setup>

	const props = defineProps({
		to: Object,
	});

</script>

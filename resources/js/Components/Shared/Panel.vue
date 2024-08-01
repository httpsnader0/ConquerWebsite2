<template>

	<Panel
		v-bind="$attrs"
		:pt="{
			root: { class: 'rounded-[8px] ' + ( hasHeader || hasStatics ? '!border border-border-light dark:border-border-dark' : '' ) },
			header: { class: !hasHeader ? '!bg-transparent !border-0 !pt-0 !px-0' + ( hasStatics ? ' !hidden' : '' ) : '' },
			content: { class: !hasHeader ? '!p-0' + ( hasStatics ? ' ' : ' !bg-transparent !border-0' ) : '!p-0' },
			icons: { class: '!m-0' },
		}"
	>

		<template #header>
			<section class="w-full flex flex-wrap justify-between items-center gap-5 min-h-[44px]">

				<Breadcrumb
					v-if="breadcrumbs?.length"
					:breadcrumbs="breadcrumbs"
				/>

				<div
					v-if="title"
					class="text-2xl font-bold text-gray-500 dark:text-white"
				>

					{{ title }}

				</div>

				<div
					v-if="slots.actions"
					class="flex justify-center items-stretch gap-2"
				>

					<slot name="actions" />

				</div>

			</section>
		</template>

		<slot />

	</Panel>

</template>

<script setup>

	import Breadcrumb from './Breadcrumb.vue';
	import Panel from 'primevue/panel';
	import { useSlots } from 'vue'

	const slots = useSlots();
	const props = defineProps({
		breadcrumbs: Array,
		title: String,
		hasHeader: Boolean,
		hasStatics: Boolean,
	});

</script>

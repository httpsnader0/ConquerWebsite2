<template>

	<nav :class="{ 'w-fit': isWebsite }">
		<ol class="flex flex-wrap justify-center items-center gap-3">

			<li
				v-for="(item, index) in breadcrumbs"
				:key="index"
				class="flex justify-center items-center gap-3"
				:class="{'text-slate-800 dark:text-slate-200 font-bold text-lg': index == lastBreadcrumbIndex, '!text-yellow-800': isWebsite }"
			>

				<Link
					v-if="item?.href"
					:href="item.href"
				>
				<span
					:class="{ '!text-white': isWebsite }"
					class="text-black dark:text-white hover:text-primary-light dark:hover:text-primary-light transition-all duration-300 ease-in-out"
				>
					{{ item.label }}
				</span>
				</Link>

				<span v-else>
					{{ item.label }}
				</span>

				<span
					v-if="index != lastBreadcrumbIndex"
					class="text-gray-400"
					:class="[$page.props.locale === 'ar' ? 'pi pi-angle-left':'pi pi pi-angle-right', { '!text-white': isWebsite }]"
				/>

			</li>

		</ol>
	</nav>

</template>

<script setup>

	import { computed } from 'vue';

	const props = defineProps({
		breadcrumbs: Array,
		isWebsite: Boolean,
	});

	const lastBreadcrumbIndex = computed(() => props.breadcrumbs.length - 1);

</script>

<template>

	<TabMenu
		:model="items"
		v-model:activeIndex="active"
		class="mb-5"
		:pt="{
			root: { class: 'rounded-[8px] border border-border-light dark:border-border-dark border-b-0' },
			menu: { class: 'dark:bg-darkbg-primary dark:border-border-dark' },
			menuitem: { class: '!-mb-0.5 dark:bg-darkbg-primary' },
			action: { class: 'h-full dark:bg-darkbg-primary  dark:border-border-dark flex justify-center items-center gap-3' },
			icon: { class: 'm-0' },
		}"
	>

		<template #item="{ label, item, props }">

			<template v-if="item.ability">

				<Link
					v-ability="item.ability"
					:href="item.route"
					v-bind="props.action"
					class=" whitespace-nowrap"
				>

				<Icon
					v-bind="props.icon"
					:icon="['fas', item.icon]"
				/>

				<span v-bind="props.label">{{ label }}</span>

				<Badge
					v-if="item.hasOwnProperty('badge')"
					:value="item.badge"
				/>

				</Link>

			</template>

			<template v-else>

				<Link
					:href="item.route"
					v-bind="props.action"
					class="whitespace-nowrap"
				>

				<Icon
					v-bind="props.icon"
					:icon="['fas', item.icon]"
				/>

				<span v-bind="props.label">{{ label }}</span>

				<Badge
					v-if="item.hasOwnProperty('badge')"
					:value="item.badge"
				/>

				</Link>

			</template>

		</template>

	</TabMenu>

</template>

<script setup>

	import { ref, onMounted } from 'vue';

	const props = defineProps({
		items: Array,
	}), active = ref(0);

	onMounted(() => {

		active.value = props.items.findIndex((item) => item.active);

	});

</script>

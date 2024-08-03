<template>

	<TabMenu :items="items" />

</template>

<script setup>

	import TabMenu from '@/Components/Menu/TabMenu.vue';
	import { useI18n } from 'vue-i18n';
	import { Ability } from '@/Classes/Ability';

	const i18n = useI18n(), props = defineProps({
		model: Object,
	}), items = [
		{
			ability: Ability.BLOGS_SHOW,
			label: i18n.t('_Blogs.Details'),
			icon: 'info-circle',
			route: route('dashboard.blogs.show', props.model.slug),
			active: route().current('dashboard.blogs.show', props.model.slug),
		},
		{
			ability: Ability.BLOGS_UPDATE,
			label: i18n.t('_Blogs.Edit'),
			icon: 'edit',
			route: route('dashboard.blogs.edit', props.model.slug),
			active: route().current('dashboard.blogs.edit', props.model.slug),
		},
	];

</script>
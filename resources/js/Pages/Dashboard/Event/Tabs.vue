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
			ability: Ability.EVENTS_SHOW,
			label: i18n.t('_Events.Details'),
			icon: 'info-circle',
			route: route('dashboard.events.show', props.model.id),
			active: route().current('dashboard.events.show', props.model.id),
		},
		{
			ability: Ability.EVENTS_UPDATE,
			label: i18n.t('_Events.Edit'),
			icon: 'edit',
			route: route('dashboard.events.edit', props.model.id),
			active: route().current('dashboard.events.edit', props.model.id),
		},
	];

</script>
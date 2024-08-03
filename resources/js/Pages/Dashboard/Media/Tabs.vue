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
			ability: Ability.MEDIA_SHOW,
			label: i18n.t('_Media.Details'),
			icon: 'info-circle',
			route: route('dashboard.media.show', props.model.id),
			active: route().current('dashboard.media.show', props.model.id),
		},
		{
			ability: Ability.MEDIA_UPDATE,
			label: i18n.t('_Media.Edit'),
			icon: 'edit',
			route: route('dashboard.media.edit', props.model.id),
			active: route().current('dashboard.media.edit', props.model.id),
		},
	];

</script>
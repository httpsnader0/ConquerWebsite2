<template>

	<AppHead title="Media" />

	<div class="flex justify-center">
		<Galleria
			:value="screenshots"
			:responsiveOptions="[
				{
					breakpoint: '1300px',
					numVisible: 4
				},
				{
					breakpoint: '575px',
					numVisible: 1
				}
			]"
			:visible="true"
			:numVisible="3"
			:circular="true"
			:showItemNavigators="true"
			:autoPlay="true"
			:transitionInterval="300000000"
			containerStyle="max-width: 50%"
			:pt="{
				previousItemButton: { class: 'w-24 h-full top-0 m-0 z-10' },
				nextItemButton: { class: 'w-24 h-full top-0 m-0 z-10' },
				thumbnailContainer: { class: 'bg-transparent' },
				previousThumbnailButton: { class: 'bg-primary rounded-xl w-12 h-12' },
				nextThumbnailButton: { class: 'bg-primary rounded-xl w-12 h-12' },
			}"
		>
			<template #item="slotProps">
				<Image
					:src="slotProps.item.image"
					:alt="`Screenshot ${slotProps.item.id}`"
					preview
					class="w-full"
					style="width: 100%; display: block"
					:pt="{
						root: { class: 'mb-5 rounded-2xl overflow-hidden' },
						image: { class: 'w-full' },
					}"
				/>
			</template>
			<template #thumbnail="slotProps">
				<div class="w-full p-2">
					<img
						:src="slotProps.item.image"
						:alt="`Screenshot ${slotProps.item.id}`"
						class="w-full border border-border-light dark:border-border-dark rounded-2xl shadow"
					/>
				</div>
			</template>
		</Galleria>
	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Galleria from 'primevue/galleria';
	import Image from 'primevue/image';

	const props = defineProps({
		videos: Object,
		screenshots: Object,
	});

</script>
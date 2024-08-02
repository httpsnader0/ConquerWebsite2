<template>

	<AppHead title="Event" />

	<div class="w-full grid grid-cols-4 gap-10 px-20 mb-20">

		<div class="panel-content">
			<Accordion :activeIndex="expandKey">

				<AccordionTab
					:header="$t('Server Events')"
					:pt="{
						content: { class: 'p-0' },
					}"
				>
					<Menu
						:model="serverEvents"
						:pt="{
							root: { class: 'border-none' },
						}"
					>
						<template #item="{ item }">
							<Link
								:href="route('website.events.show', item.slug)"
								class="w-full flex justify-start items-center py-3 px-5"
								:class="{ 'bg-primary text-white': route().current('website.events.show', item.slug) }"
							>
							{{ item.name }}
							</Link>
						</template>
					</Menu>
				</AccordionTab>

				<AccordionTab
					:header="$t('Boss Monsters')"
					:pt="{
						content: { class: 'p-0' },
					}"
				>
					<Menu
						:model="bossMonsters"
						:pt="{
							root: { class: 'border-none' },
						}"
					>
						<template #item="{ item }">
							<Link
								:href="route('website.events.show', item.slug)"
								class="w-full flex justify-start items-center py-3 px-5"
								:class="{ 'bg-primary text-white': route().current('website.events.show', item.slug) }"
							>
							{{ item.name }}
							</Link>
						</template>
					</Menu>
				</AccordionTab>

				<AccordionTab
					:header="$t('Server Quests')"
					:pt="{
						content: { class: 'p-0' },
					}"
				>
					<Menu
						:model="serverQuests"
						:pt="{
							root: { class: 'border-none' },
						}"
					>
						<template #item="{ item }">
							<Link
								:href="route('website.events.show', item.slug)"
								class="w-full flex justify-start items-center py-3 px-5"
								:class="{ 'bg-primary text-white': route().current('website.events.show', item.slug) }"
							>
							{{ item.name }}
							</Link>
						</template>
					</Menu>
				</AccordionTab>

			</Accordion>
		</div>

		<div class="panel-content col-span-3">

			<div v-html="event.explain" />

		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Accordion from 'primevue/accordion';
	import AccordionTab from 'primevue/accordiontab';
	import Menu from 'primevue/menu';
	import { computed } from 'vue';

	const props = defineProps({
		event: Object,
		serverEvents: Object,
		bossMonsters: Object,
		serverQuests: Object,
	});

	const expandKey = computed(() => {
		switch (props.event.type) {

			case 'Server Events':
				return 0;

			case 'Boss Monsters':
				return 1;

			case 'Server Quests':
				return 2;

		}
	})

</script>
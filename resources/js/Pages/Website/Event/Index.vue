<template>

	<AppHead title="Event" />

	<div class="w-full flex flex-col gap-10 px-20 mb-20">

		<div>
			<Title :title="$t('Server Events')" />

			<div class="flex flex-wrap justify-center">

				<template
					v-for="(serverEvent, index) in serverEvents"
					:key="index"
				>

					<div class="w-1/5 p-3">
						<Link
							:href="route('website.events.show', serverEvent.slug)"
							class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-center gap-3 text-start !shadow-lg"
						>

						<img
							:src="serverEvent.image"
							:alt="serverEvent.name"
							class="absolute top-0 left-0 w-full h-full"
						/>

						<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

						<span
							v-text="serverEvent.name"
							class="text-primary text-2xl relative"
						/>

						</Link>
					</div>

				</template>

			</div>

		</div>

		<div class="mt-10">
			<Title :title="$t('Boss Monsters')" />

			<div class="flex flex-wrap justify-center">

				<template
					v-for="(bossMonster, index) in bossMonsters"
					:key="index"
				>

					<div class="w-1/5 p-3">
						<Link
							:href="route('website.events.show', bossMonster.slug)"
							class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-center gap-3 text-start !shadow-lg"
						>

						<img
							:src="bossMonster.image"
							:alt="bossMonster.name"
							class="absolute top-0 left-0 w-full h-full"
						/>

						<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

						<span
							v-text="bossMonster.name"
							class="text-primary text-2xl relative"
						/>

						</Link>
					</div>

				</template>

			</div>
		</div>

		<div class="mt-10">
			<Title :title="$t('Server Quests')" />

			<div class="flex flex-wrap justify-center">

				<template
					v-for="(serverQuest, index) in serverQuests"
					:key="index"
				>

					<div class="w-1/5 p-3">
						<Link
							:href="route('website.events.show', serverQuest.slug)"
							class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-center gap-3 text-start !shadow-lg"
						>

						<img
							:src="serverQuest.image"
							:alt="serverQuest.name"
							class="absolute top-0 left-0 w-full h-full"
						/>

						<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

						<span
							v-text="serverQuest.name"
							class="text-primary text-2xl relative"
						/>

						</Link>
					</div>

				</template>

			</div>
		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Title from '@/Layouts/Website/Components/Title.vue';

	const props = defineProps({
		serverEvents: Object,
		bossMonsters: Object,
		serverQuests: Object,
	});

</script>
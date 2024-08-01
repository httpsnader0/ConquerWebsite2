<template>

	<AppHead title="Event" />

	<div class="w-full flex flex-col gap-10 px-20 mb-20">

		<div>
			<Title
				:title="$t('Server Events')"
				class="mt-10"
			/>

			<div class="w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

				<div class="w-full border rounded-2xl shadow">
					<table class="w-full text-center">
						<tr class="border-b">
							<th class="p-5 border-r w-1/4">{{ $t('Name') }}</th>
							<th class="p-5 border-r w-1/4">{{ $t('Time') }}</th>
							<th class="p-5 border-r w-2/4">{{ $t('Reward') }}</th>
						</tr>
						<tr
							v-for="(event, index) in events"
							:key="index"
							:class="index != Object.keys(events).length - 1 ? 'border-b' : ''"
						>
							<td class="p-3 border-r w-1/4">{{ event.name }}</td>
							<td class="p-3 border-r w-1/4">{{ event.time }}</td>
							<td class="p-3 border-r w-2/4">
								<div class="flex justify-center items-center gap-1">
									<template
										v-for="(reward, rindex) in event.reward"
										:key="rindex"
									>
										<Badge :value="reward" />
									</template>
								</div>
							</td>
						</tr>
					</table>
				</div>

			</div>
		</div>

		<div>
			<Title
				:title="$t('Boss Monsters')"
				class="mt-10"
			/>

			<div class="w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

				<div class="w-full border rounded-2xl shadow">
					<table class="w-full text-center">
						<tr class="border-b">
							<th class="p-5 border-r w-1/4">{{ $t('Name') }}</th>
							<th class="p-5 border-r w-1/4">{{ $t('Time') }}</th>
							<th class="p-5 border-r w-2/4">{{ $t('Reward') }}</th>
						</tr>
						<tr
							v-for="(boss, index) in booses"
							:key="index"
							:class="index != Object.keys(booses).length - 1 ? 'border-b' : ''"
						>
							<td class="p-3 border-r w-1/4">{{ boss.name }}</td>
							<td class="p-3 border-r w-1/4">{{ boss.time }}</td>
							<td class="p-3 border-r w-2/4">
								<div class="flex justify-center items-center gap-1">
									<template
										v-for="(reward, rindex) in boss.reward"
										:key="rindex"
									>
										<Badge :value="reward" />
									</template>
								</div>
							</td>
						</tr>
					</table>
				</div>

			</div>
		</div>

		<div>
			<Title
				:title="$t('Server Quests')"
				class="mt-10"
			/>

			<div class="w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

				<div class="w-full border rounded-2xl shadow">
					<table class="w-full text-center">
						<tr class="border-b">
							<th class="p-5 border-r w-1/4">{{ $t('Name') }}</th>
							<th class="p-5 border-r w-3/4">{{ $t('Reward') }}</th>
						</tr>
						<tr
							v-for="(quest, index) in quests"
							:key="index"
							:class="index != Object.keys(quests).length - 1 ? 'border-b' : ''"
						>
							<td class="p-3 border-r w-1/4">{{ quest.name }}</td>
							<td class="p-3 border-r w-3/4">
								<div class="flex justify-center items-center gap-1">
									<template
										v-for="(reward, rindex) in quest.reward"
										:key="rindex"
									>
										<Badge :value="reward" />
									</template>
								</div>
							</td>
						</tr>
					</table>
				</div>

			</div>
		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Title from '@/Layouts/Website/Components/Title.vue';

	const events = [
		{
			'name': 'Guild War',
			'time': 'Every Friday At 22:00',
			'reward': [
				'2,000,000 CPs',
				'GoldPrize',
				'Top GuildLeader / DeputyLeader',
			],
		},
		{
			'name': 'Elite PK',
			'time': 'Every Friday At 22:00',
			'reward': [
				'2,000,000 CPs',
				'Top ElitePK',
			],
		},
		{
			'name': 'Team PK',
			'time': 'Every Friday At 22:00',
			'reward': [
				'2,000,000 CPs',
			],
		},
		{
			'name': 'Skill Team PK',
			'time': 'Every Friday At 22:00',
			'reward': [
				'2,000,000 CPs',
			],
		},
		{
			'name': 'Capture The Flag',
			'time': 'Every Friday At 22:00',
			'reward': [
				'2,000,000 CPs',
				'2,000,000,000 Money',
			],
		},
		{
			'name': 'Class War',
			'time': 'Every Friday At 22:00',
			'reward': [
				'2,000,000 CPs',
				'Top Class',
				'Show At Website Ranking',
			],
		},
	];

	const booses = [
		{
			'name': 'Terato Dragon',
			'time': 'Every Houre At xx:05',
			'reward': [
				'500,000 CPs',
				'100 Monster Points',
			],
		},
		{
			'name': 'Snow Banshee',
			'time': 'Every Houre At xx:10',
			'reward': [
				'500,000 CPs',
				'100 Monster Points',
			],
		},
		{
			'name': 'Thrilling Spook',
			'time': 'Every Houre At xx:15',
			'reward': [
				'500,000 CPs',
				'100 Monster Points',
			],
		},
		{
			'name': 'Sword Master',
			'time': 'Every Houre At xx:20',
			'reward': [
				'500,000 CPs',
				'100 Monster Points',
			],
		},
		{
			'name': 'Nemesis Tyrant',
			'time': 'Every Houre At xx:25',
			'reward': [
				'500,000 CPs',
				'100 Monster Points',
			],
		},
		{
			'name': 'Lava Beast',
			'time': 'Every Houre At xx:30',
			'reward': [
				'500,000 CPs',
				'100 Monster Points',
			],
		},
	];

	const quests = [
		{
			'name': 'Conquer Letter',
			'reward': [
				'2,000,000 CPs',
				'GoldPrize',
				'Top GuildLeader / DeputyLeader',
			],
		},
	];

</script>
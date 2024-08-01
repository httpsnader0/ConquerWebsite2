<template>

	<AppHead title="Download" />

	<div class="w-full grid grid-cols-2 gap-5 px-20 mb-20">

		<div class="w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

			<div class="w-full text-2xl flex justify-center items-center gap-2">
				{{ $t('Download Client') }}
				<Badge
					severity="danger"
					:value="$t('Recommended')"
				/>
			</div>

			<a
				:href="client.url"
				class="w-full"
			>
				<Button class="w-full flex-col p-10 text-2xl uppercase">
					<Icon
						:icon="['fas', 'download']"
						class="text-5xl"
					/>
					{{ $t('Download Now') }}
				</Button>
			</a>

			<div class="w-full border rounded-2xl shadow">
				<table class="w-full text-center">
					<tr class="border-b">
						<th class="p-5 border-r w-1/2">{{ $t('Size') }}</th>
						<td class="p-5 w-1/2">{{ client.size }} {{ $t('GB') }}</td>
					</tr>
					<tr>
						<th class="p-5 border-r w-1/2">{{ $t('Release Date') }}</th>
						<td class="p-5 w-1/2">{{ client.release_date }}</td>
					</tr>
				</table>
			</div>

		</div>

		<div class="w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

			<div class="text-2xl flex justify-center items-center gap-2">
				{{ $t('Download Full Patch') }}
			</div>

			<a
				:href="patch.url"
				class="w-full"
			>
				<Button class="w-full flex-col p-10 text-2xl uppercase">
					<Icon
						:icon="['fas', 'download']"
						class="text-5xl"
					/>
					{{ $t('Download Now') }}
				</Button>
			</a>

			<div class="w-full border rounded-2xl shadow">
				<table class="w-full text-center">
					<tr class="border-b">
						<th class="p-5 border-r w-1/2">{{ $t('Size') }}</th>
						<td class="p-5 w-1/2">{{ patch.size }} {{ $t('MB') }}</td>
					</tr>
					<tr>
						<th class="p-5 border-r w-1/2">{{ $t('Release Date') }}</th>
						<td class="p-5 w-1/2">{{ patch.release_date }}</td>
					</tr>
				</table>
			</div>

		</div>

		<div class="col-span-2 mt-10">

			<Title
				:title="$t('Game Installation')"
				class="mt-10"
			/>

			<div class="grid grid-cols-3 gap-5">

				<template
					v-for="(installation, index) in installations"
					:key="index"
				>
					<div class="w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark text-center">

						<div class="rounded-2xl bg-border-light text-3xl w-14 h-14 flex justify-center items-center opacity-30 shadow-lg font-bold">
							{{ index + 1 }}
						</div>

						{{ installation.title[$page.props.locale] }}

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
		client: Object,
		patch: Object,
		installations: Object,
	});

</script>